<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
    
class AttendanceController extends Controller
{
    // Check In / Check Out
    public function checkIn(Request $request)
    {
        $user = $request->user();
        $today = Carbon::today()->toDateString();

        // Check if already checked in today
        $attendance = Attendance::where('user_id', $user->id)
            ->where('date', $today)
            ->first();

        if (!$attendance) {
            // First scan = Check In
            $checkInTime = Carbon::now()->toTimeString();
            
            // Check if late (after 8:00 AM)
            $status = Carbon::now()->format('H:i') > '08:00' ? 'late' : 'present';

            Attendance::create([
                'user_id' => $user->id,
                'date' => $today,
                'check_in_time' => $checkInTime,
                'status' => $status
            ]);

            return response()->json([
                'message' => 'Check-in successful!',
                'type' => 'check_in',
                'time' => $checkInTime,
                'status' => $status
            ]);

        } else if ($attendance->check_out_time == null) {
            // Second scan = Check Out
            $checkOutTime = Carbon::now()->toTimeString();
            
            $attendance->update([
                'check_out_time' => $checkOutTime
            ]);

            return response()->json([
                'message' => 'Check-out successful!',
                'type' => 'check_out',
                'time' => $checkOutTime
            ]);

        } else {
            return response()->json([
                'message' => 'Already checked in and out today!',
                'type' => 'done'
            ]);
        }
    }

    // Get attendance list
    public function myAttendance(Request $request)
    {
        $user = $request->user();
        
        $attendances = Attendance::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();

        return response()->json([
            'attendances' => $attendances
        ]);
    }

    // Get today's attendance
    public function today(Request $request)
    {
        $user = $request->user();
        $today = Carbon::today()->toDateString();

        $attendance = Attendance::where('user_id', $user->id)
            ->where('date', $today)
            ->first();

        return response()->json([
            'attendance' => $attendance
        ]);
    }
    // Get staff stats
    public function myStats(Request $request)
    {
        $user = $request->user();

        $present = Attendance::where('user_id', $user->id)
        ->where('status', 'present')
        ->count();

        $late = Attendance::where('user_id', $user->id)
        ->where('status', 'late')
        ->count();

        $absent = Attendance::where('user_id', $user->id)
        ->where('status', 'absent')
        ->count();

        $leave = \App\Models\Leave::where('user_id', $user->id)
        ->where('status', 'approved')
        ->count();

        return response()->json([
        'present' => $present,
        'late' => $late,
        'absent' => $absent,
        'leave' => $leave
        ]);
    }
}