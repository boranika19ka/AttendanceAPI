<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Overtime;

class OvertimeController extends Controller
{
    public function index()
    {
        $overtimes = Overtime::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.overtime', compact('overtimes'));
    }

    public function approve($id)
    {
        Overtime::findOrFail($id)->update(['status' => 'approved']);
        return back()->with('success', 'Overtime approved!');
    }

    public function reject($id)
    {
        Overtime::findOrFail($id)->update(['status' => 'rejected']);
        return back()->with('success', 'Overtime rejected!');
    }
}