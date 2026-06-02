<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    // Submit leave request
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        $leave = Leave::create([
            'user_id' => $request->user()->id,
            'reason' => $request->reason,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Leave request submitted successfully!',
            'leave' => $leave
        ]);
    }

    // Get my leave requests
    public function myLeaves(Request $request)
    {
        $leaves = Leave::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'leaves' => $leaves
        ]);
    }
}