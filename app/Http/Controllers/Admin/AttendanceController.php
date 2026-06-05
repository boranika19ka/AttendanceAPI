<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->orderBy('date', 'desc')->get();
        return view('admin.attendance', compact('attendances'));
    }
}