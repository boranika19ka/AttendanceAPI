<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\OvertimeController;

// Redirect root to login
Route::get('/', function () {
    return redirect('/admin/login');
});

// Admin Auth
Route::get('/admin/login', [DashboardController::class, 'loginPage'])->name('admin.login');
Route::post('/admin/login', [DashboardController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');

// Admin Pages (protected)
Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Staff
    Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('admin.staff.store');
    Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('admin.staff.update');
    Route::get('/staff/delete/{id}', [StaffController::class, 'destroy'])->name('admin.staff.delete');

    // Attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('admin.attendance');

    // Leave
    Route::get('/leave', [LeaveController::class, 'index'])->name('admin.leave');
    Route::get('/leave/approve/{id}', [LeaveController::class, 'approve'])->name('admin.leave.approve');
    Route::get('/leave/reject/{id}', [LeaveController::class, 'reject'])->name('admin.leave.reject');

    // Overtime
    Route::get('/overtime', [OvertimeController::class, 'index'])->name('admin.overtime');
    Route::get('/overtime/approve/{id}', [OvertimeController::class, 'approve'])->name('admin.overtime.approve');
    Route::get('/overtime/reject/{id}', [OvertimeController::class, 'reject'])->name('admin.overtime.reject');
});