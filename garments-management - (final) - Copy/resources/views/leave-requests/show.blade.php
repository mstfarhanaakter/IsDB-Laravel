@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Leave Request Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Employee:</strong> {{ $leaveRequest->employee->first_name ?? 'N/A' }} {{ $leaveRequest->employee->last_name ?? '' }}</p>
            <p><strong>Start Date:</strong> {{ $leaveRequest->start_date }}</p>
            <p><strong>End Date:</strong> {{ $leaveRequest->end_date }}</p>
            <p><strong>Reason:</strong> {{ $leaveRequest->reason }}</p>
            <p><strong>Status:</strong> {{ $leaveRequest->status }}</p>

            <a href="{{ route('leave-requests.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
