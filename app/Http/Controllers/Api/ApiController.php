<?php

namespace App\Http\Controllers\Api;

use App\Models\Fee;
use App\Models\AuthLog;
use App\Models\Student;
use App\Models\FeeRecord;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

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
                'fee' => ''
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

    public function getBrowserUsage()
    {
        $browsers = [];

        $activities = AuthLog::pluck('user_agent');

        foreach ($activities as $userAgent) {
            $agent = new Agent();
            $agent->setUserAgent($userAgent);

            $browser = $agent->browser();

            // Increment count
            if (isset($browsers[$browser])) {
                $browsers[$browser]++;
            } else {
                $browsers[$browser] = 1;
            }
        }

        // Format for ApexChart
        $chartData = [
            'labels' => array_keys($browsers),
            'series' => array_values($browsers),
        ];

        return response()->json($chartData);
    }


    public function getFeeRecordData() {

        // $dataset = FeeRecord::selectRaw('DATE(created_at) as date, SUM(amount_paid) as amount')
        // ->groupBy('date')
        // ->orderBy('date')
        // ->get();

        // return $dataset;

        $dataset = FeeRecord::selectRaw('DATE(created_at) as date, SUM(amount_paid) as amount')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return $dataset;

       /*  $startDate = Carbon::now()->subDays(30); // Last 30 days
        $endDate = Carbon::now();

        // Get amounts grouped by date
        $records = FeeRecord::selectRaw('DATE(created_at) as date, SUM(amount_paid) as amount')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('amount', 'date'); // key = date, value = amount

        // Fill missing dates with 0
        $dates = new Collection();
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $formattedDate = $date->toDateString();
            $dates->push([
                'date' => $formattedDate,
                'amount' => $records[$formattedDate] ?? 0,
            ]);
        }

        return response()->json($dates); */
    }
}
