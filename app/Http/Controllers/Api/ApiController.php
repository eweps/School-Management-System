<?php

namespace App\Http\Controllers\Api;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeeRecord;

class ApiController extends Controller
{
    public function getStudentFees($studentId)
    {
        $student = Student::find($studentId);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found',
            ], 404);
        }

        $fees = $student->fees;

        return response()->json([
            'success' => true,
            'fees' => $fees,
        ]);
    }
    
    public function getFee($feeId) {
          $fee = Fee::find($feeId);

          if(!$fee) {
             return response()->json([
                'success' => false,
                'message' => 'Fee not found',
            ], 404);
          }

        return response()->json([
            'success' => true,
            'fee' => $fee,
        ]);
    } 


     public function getLastPaidFee($studentId, $feeId) {
          $record = FeeRecord::where(['student_id' => $studentId, 'fee_id' => $feeId])->orderByDesc('id')->first();

          if(!$record) {
             return response()->json([
                'success' => false,
                'message' => 'Fee Record not found',
            ], 404);
          }

        return response()->json([
            'success' => true,
            'record' => $record,
        ]);
    } 
}
