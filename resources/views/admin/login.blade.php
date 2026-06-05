<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #1A237E;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <div style="font-size: 50px;">🎯</div>
            <h3 style="color: #1A237E; font-weight: bold;">MyAttendance</h3>
            <p class="text-muted">Admin Login</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/admin/login">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn w-100" style="background: #1A237E; color: white;">
                Login
            </button>
        </form>
    </div>
</body>
</html>