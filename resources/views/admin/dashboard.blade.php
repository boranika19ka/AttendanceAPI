@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="stat-card" style="background: #1A237E;">
            <div style="font-size: 30px;">👥</div>
            <h2>{{ $totalStaff }}</h2>
            <p>Total Staff</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: #4CAF50;">
            <div style="font-size: 30px;">✅</div>
            <h2>{{ $totalAttendance }}</h2>
            <p>Today Attendance</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: #FF9800;">
            <div style="font-size: 30px;">📝</div>
            <h2>{{ $pendingLeave }}</h2>
            <p>Pending Leave</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: #F44336;">
            <div style="font-size: 30px;">⏰</div>
            <h2>{{ $pendingOvertime }}</h2>
            <p>Pending Overtime</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card p-3">
            <h5>⚡ Quick Actions</h5>
            <a href="/admin/staff/create" class="btn mt-2" style="background:#1A237E; color:white;">
                ➕ Add New Staff
            </a>
            <a href="/admin/leave" class="btn mt-2" style="background:#FF9800; color:white;">
                📝 Review Leave Requests
            </a>
            <a href="/admin/overtime" class="btn mt-2" style="background:#F44336; color:white;">
                ⏰ Review Overtime Requests
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-3">
            <h5>📊 System Info</h5>
            <p>🗓️ Today: {{ date('d M Y') }}</p>
            <p>⏰ Time: {{ date('H:i') }}</p>
            <p>👤 Admin: {{ session('admin_name') }}</p>
        </div>
    </div>
</div>

@endsection