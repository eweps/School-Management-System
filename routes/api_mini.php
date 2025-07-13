<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
// API routes

Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::get('api/student/fees/{id}', [ApiController::class, 'getStudentFees']);
   Route::get('api/fee/{id}', [ApiController::class, 'getFee']);
   Route::get('api/student/fee/lastpaid/{studentId}/{feeId}', [ApiController::class, 'getLastPaidFee']);
   Route::get('/api/browser-usage', [ApiController::class, 'getBrowserUsage']);
   Route::get('/api/fee-records', [ApiController::class, 'getFeeRecordData']);
});
