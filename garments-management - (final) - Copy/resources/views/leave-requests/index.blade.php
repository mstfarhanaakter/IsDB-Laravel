@extends('layouts.app')

@section('content')
<div class="container mt-3">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Leave Requests</h3>
                <a href="{{ route('leave-requests.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Leave Request
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th width="200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaveRequests as $leave)
                            <tr>
                                <td>{{ $leave->id }}</td>
                                <td class="fw-semibold">
                                    {{ $leave->employee->first_name ?? 'N/A' }} {{ $leave->employee->last_name ?? '' }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</td>
                                <td>{{ $leave->reason }}</td>
                                <td>
                                    @if($leave->status == 'Approved')
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($leave->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($leave->status == 'Rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $leave->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('leave-requests.show', $leave->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('leave-requests.edit', $leave->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('leave-requests.destroy', $leave->id) }}" 
                                          method="POST" class="d-inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this leave request?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No leave requests found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
