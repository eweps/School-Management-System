<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Fee;
use App\Models\Student;
use App\Models\FeeRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use App\Services\TransactionReferenceService;

class FeeRecordController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.fee-records.index', [
            'feeRecords' => FeeRecord::orderByDesc('id')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.fee-records.create', [
            'students' => Student::orderByDesc('id')->get(),
            'fees' => Fee::orderByDesc('id')->get(),
            
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student' => 'required|integer',
            'amount' => 'required|numeric|min:1',
            'fee' => 'required|integer',
            'receipt' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,zip,jpg,png|max:6144', // 6MB max
        ]);

        $path = $request->file('receipt')->store('receipts', 'public');

        // get last amount left form last students record of fee

        $fee = Fee::findOrFail($validated['fee']);

        $record = FeeRecord::where(['student_id' => $validated['student'], 'fee_id' => $fee->id])->orderByDesc('id')->first();

        // if no fee record in database
        if(!$record) {
            $amountLeft = $fee->amount - (float) $validated['amount'];
        }else {
            $amountLeft = $record->amount_left - (float) $validated['amount'];
        }
        
        if($amountLeft < 0) {
            return redirect()->back()->with('error', 'Incorrect fee value or Student already completed fee'); 
        }

        FeeRecord::create([
            'reference' => TransactionReferenceService::generate(),
            'student_id' => $validated['student'],
            'fee_id' => $validated['fee'],
            'amount_paid' => $validated['amount'],
            'total_amount' => $fee->amount,
            'amount_left' => $amountLeft,
            'receipt' => $path,
        ]);    
        
        return redirect()->back()->with(['status' => 'fee-record-created']); 
    }

    public function destroy(Request $request)
    {
         $validated = $request->validate([
            'id' => 'required|integer',
            'student_id' => 'required|integer',
            'fee_id' => 'required|integer'
        ]);

        try {
            $record = FeeRecord::findOrFail($validated['id']);

            if($record->count() > 1) {

                //if admin trying to delete first record
                $studentFirstRecord = $this->getFirstFeeRecord($validated['student_id'], $validated['fee_id']);
                 
                if($studentFirstRecord->id === (int) $validated['id']) {
                    return redirect()->back()->with("error", "You cannot delete the first transaction");
                }
                else {
                     $record->delete();
                      // if reciept exist delete it
                    if ($record->receipt && Storage::exists($record->receipt)) {
                        Storage::delete($record->receipt);
                    }
                    return back()->with(['status' => 'fee-record-deleted']);
                }

            }
            else {
                
                $record->delete();
    
                // if reciept exist delete it
                if ($record->receipt && Storage::exists($record->receipt)) {
                    Storage::delete($record->receipt);
                }
                return back()->with(['status' => 'fee-record-deleted']);
            }
        

        } 
        catch (QueryException $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }

    }


    private function getFirstFeeRecord($studentId, $feeId) {
        $record = FeeRecord::where(['student_id' => $studentId, 'fee_id' => $feeId])->orderBy('id', 'ASC')->first();
        return $record;
    }

}
