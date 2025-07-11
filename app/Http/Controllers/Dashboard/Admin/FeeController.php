<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
use App\Models\Fee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ResourceDeleteService;
use Illuminate\Database\QueryException;
use App\Exceptions\CannotDeleteUsedResourceException;

class FeeController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.fees.index', [
            'fees' => Fee::orderByDesc('id')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.fees.create', [
             'departments' => Department::orderByDesc('id')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'department' => 'required|integer'
        ]);

        Fee::create([
            'title' => $validated['title'],
            'amount' => $validated['amount'],
            'department_id' => $validated['department']
        ]);

        return back()->with(['status' => 'fee-created']);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.fees.edit', [
            'fee' => Fee::findOrFail($id),
            'departments' => Department::orderByDesc('id')->get()
        ]);
    }

    public function update(Request $request, int $id) 
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'department' => 'required|integer'
        ]);

        $fee = Fee::findOrFail($id);

        $fee->update([
            'title' => $validated['title'],
            'amount' => $validated['amount'],
            'department_id' => $validated['department']
        ]);

         return back()->with(['status' => 'fee-updated']);
    }

     public function destroy(Request $request, ResourceDeleteService $deleteWorker)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $fee = Fee::findOrFail($validated['id']);
            $deleteWorker->checkAndDeleteFee($fee);
            return back()->with(['status' => 'fee-deleted']);
        } 
        catch (CannotDeleteUsedResourceException $e) {
            return back()->with('error', $e->getMessage());
        }
        catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
