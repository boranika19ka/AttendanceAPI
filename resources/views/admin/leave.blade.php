@extends('admin.layout')
@section('title', 'Leave Requests')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">📝 Leave Requests</h5>
        <table class="table table-hover">
            <thead style="background:#1A237E; color:white;">
                <tr>
                    <th>#</th>
                    <th>Staff Name</th>
                    <th>Reason</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $index => $l)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $l->user->name ?? 'N/A' }}</td>
                    <td>{{ $l->reason }}</td>
                    <td>{{ $l->start_date }}</td>
                    <td>{{ $l->end_date }}</td>
                    <td>
                        @if($l->status == 'pending')
                            <span class="badge bg-warning">⏳ Pending</span>
                        @elseif($l->status == 'approved')
                            <span class="badge bg-success">✅ Approved</span>
                        @else
                            <span class="badge bg-danger">❌ Rejected</span>
                        @endif
                    </td>
                    <td>
                        @if($l->status == 'pending')
                            <a href="/admin/leave/approve/{{ $l->id }}"
                               class="btn btn-sm btn-success">✅ Approve</a>
                            <a href="/admin/leave/reject/{{ $l->id }}"
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