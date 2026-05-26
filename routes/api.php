<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AttendanceController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Attendance
    Route::post('/checkin', [AttendanceController::class, 'checkIn']);
    Route::get('/attendance', [AttendanceController::class, 'myAttendance']);
    Route::get('/attendance/today', [AttendanceController::class, 'today']);
});