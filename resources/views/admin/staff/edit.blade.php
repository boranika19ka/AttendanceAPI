@extends('admin.layout')
@section('title', 'Edit Staff')
@section('content')

<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <h5 class="mb-4">✏️ Edit Staff</h5>
        <form method="POST" action="/admin/staff/update/{{ $staff->id }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ $staff->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $staff->email }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">New Password (leave blank to keep same)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn" style="background:#1A237E; color:white;">
                Update Staff
            </button>
            <a href="/admin/staff" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>

@endsection