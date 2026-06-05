<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\Overtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function loginPage()
    {
        if (session('admin_logged_in')) {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)
            ->where('role', 'admin')
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['admin_logged_in' => true, 'admin_name' => $user->name]);
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid email or password!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/admin/login');
    }

    public function index()
    {
        $totalStaff = User::where('role', 'staff')->count();
        $totalAttendance = Attendance::whereDate('date', today())->count();
        $pendingLeave = Leave::where('status', 'pending')->count();
        $pendingOvertime = Overtime::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalStaff',
            'totalAttendance',
            'pendingLeave',
            'pendingOvertime'
        ));
    }
}