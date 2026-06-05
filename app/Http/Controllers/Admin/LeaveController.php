<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.leave', compact('leaves'));
    }

    public function approve($id)
    {
        Leave::findOrFail($id)->update(['status' => 'approved']);
        return back()->with('success', 'Leave approved!');
    }

    public function reject($id)
    {
        Leave::findOrFail($id)->update(['status' => 'rejected']);
        return back()->with('success', 'Leave rejected!');
    }
}