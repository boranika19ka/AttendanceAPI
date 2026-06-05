<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MyAttendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f5f5f5; }
        .sidebar {
            background: #1A237E;
            min-height: 100vh;
            padding: 20px 0;
        }
        .sidebar a {
            color: #BBDEFB;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            font-size: 15px;
        }
        .sidebar a:hover { background: #283593; color: #fff; }
        .sidebar a.active { background: #283593; color: #fff; }
        .sidebar .brand {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            padding: 0 20px 20px;
            border-bottom: 1px solid #283593;
            margin-bottom: 10px;
        }
        .main-content { padding: 20px; }
        .stat-card {
            border-radius: 12px;
            padding: 20px;
            color: white;
            margin-bottom: 16px;
        }
        .card { border-radius: 12px; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-0">
            <div class="brand">🎯 MyAttendance</div>
            <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>
            <a href="/admin/staff" class="{{ request()->is('admin/staff*') ? 'active' : '' }}">
                👥 Staff
            </a>
            <a href="/admin/attendance" class="{{ request()->is('admin/attendance*') ? 'active' : '' }}">
                📋 Attendance
            </a>
            <a href="/admin/leave" class="{{ request()->is('admin/leave*') ? 'active' : '' }}">
                📝 Leave
            </a>
            <a href="/admin/overtime" class="{{ request()->is('admin/overtime*') ? 'active' : '' }}">
                ⏰ Overtime
            </a>
            <a href="/admin/logout" style="margin-top: 20px; color: #ff8a80;">
                🚪 Logout
            </a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 main-content">
            <!-- Top bar -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">@yield('title')</h4>
                <span class="text-muted">👤 {{ session('admin_name') }}</span>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>