<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\OvertimeController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Attendance
    Route::post('/checkin', [AttendanceController::class, 'checkIn']);
    Route::get('/attendance', [AttendanceController::class, 'myAttendance']);
    Route::get('/attendance/today', [AttendanceController::class, 'today']);
    // Leave
    Route::post('/leave', [LeaveController::class, 'store']);
    Route::get('/leave', [LeaveController::class, 'myLeaves']);
    Route::get('/stats', [AttendanceController::class, 'myStats']);
    // Overtime
    Route::post('/overtime', [OvertimeController::class, 'store']);
    Route::get('/overtime', [OvertimeController::class, 'myOvertimes']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
});