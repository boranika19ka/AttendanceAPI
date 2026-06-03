<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Overtime;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'hours' => 'required|numeric|min:0.5|max:12',
            'reason' => 'required|string'
        ]);

        $overtime = Overtime::create([
            'user_id' => $request->user()->id,
            'date' => $request->date,
            'hours' => $request->hours,
            'reason' => $request->reason,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Overtime request submitted!',
            'overtime' => $overtime
        ]);
    }

    public function myOvertimes(Request $request)
    {
        $overtimes = Overtime::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'overtimes' => $overtimes
        ]);
    }
}