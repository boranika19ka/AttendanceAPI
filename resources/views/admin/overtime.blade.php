@extends('admin.layout')
@section('title', 'Overtime Requests')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">⏰ Overtime Requests</h5>
        <table class="table table-hover">
            <thead style="background:#1A237E; color:white;">
                <tr>
                    <th>#</th>
                    <th>Staff Name</th>
                    <th>Date</th>
                    <th>Hours</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($overtimes as $index => $o)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $o->user->name ?? 'N/A' }}</td>
                    <td>{{ $o->date }}</td>
                    <td>{{ $o->hours }} hrs</td>
                    <td>{{ $o->reason }}</td>
                    <td>
                        @if($o->status == 'pending')
                            <span class="badge bg-warning">⏳ Pending</span>
                        @elseif($o->status == 'approved')
                            <span class="badge bg-success">✅ Approved</span>
                        @else
                            <span class="badge bg-danger">❌ Rejected</span>
                        @endif
                    </td>
                    <td>
                        @if($o->status == 'pending')
                            <a href="/admin/overtime/approve/{{ $o->id }}"
                               class="btn btn-sm btn-success">✅ Approve</a>
                            <a href="/admin/overtime/reject/{{ $o->id }}"
                               class="btn btn-sm btn-danger">❌ Reject</a>
                        @else
                            <span class="text-muted">Done</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection