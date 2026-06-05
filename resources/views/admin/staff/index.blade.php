@extends('admin.layout')
@section('title', 'Staff Management')
@section('content')

<div class="d-flex justify-content-between mb-3">
    <h5>👥 All Staff ({{ count($staff) }})</h5>
    <a href="/admin/staff/create" class="btn" style="background:#1A237E; color:white;">
        ➕ Add New Staff
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead style="background:#1A237E; color:white;">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->email }}</td>
                    <td>
                        <span class="badge" style="background:#1A237E;">
                            {{ $s->role }}
                        </span>
                    </td>
                    <td>
                        <a href="/admin/staff/edit/{{ $s->id }}"
                           class="btn btn-sm btn-warning">✏️ Edit</a>
                        <a href="/admin/staff/delete/{{ $s->id }}"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Delete this staff?')">🗑️ Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection