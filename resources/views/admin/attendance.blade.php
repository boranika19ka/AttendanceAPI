@extends('admin.layout')
@section('title', 'Attendance Records')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">📋 All Attendance Records</h5>
        <table class="table table-hover">
            <thead style="background:#1A237E; color:white;">
                <tr>
                    <th>#</th>
                    <th>Staff Name</th>
                    <th>Date</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $index => $a)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $a->user->name ?? 'N/A' }}</td>
                    <td>{{ $a->date }}</td>
                    <td>{{ $a->check_in_time ?? '--:--' }}</td>
                    <td>{{ $a->check_out_time ?? '--:--' }}</td>
                    <td>
                        @if($a->status == 'present')
                            <span class="badge bg-success">✅ Present</span>
                        @elseif($a->status == 'late')
                            <span class="badge bg-warning">⚠️ Late</span>
                        @else
                            <span class="badge bg-danger">❌ Absent</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection