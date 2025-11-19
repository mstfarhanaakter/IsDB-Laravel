@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Leave Request</h2>

    <form action="{{ route('leave-requests.update', $leaveRequest->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Employee *</label>
                <select name="employee_id" class="form-control" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $leaveRequest->employee_id == $employee->id ? 'selected' : '' }}>
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label>Start Date *</label>
                <input type="date" name="start_date" class="form-control" value="{{ $leaveRequest->start_date }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label>End Date *</label>
                <input type="date" name="end_date" class="form-control" value="{{ $leaveRequest->end_date }}" required>
            </div>

            <div class="col-md-12 mb-3">
                <label>Reason *</label>
                <textarea name="reason" class="form-control" rows="3" required>{{ $leaveRequest->reason }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Status *</label>
                <select name="status" class="form-control" required>
                    <option value="Pending" {{ $leaveRequest->status=='Pending'?'selected':'' }}>Pending</option>
                    <option value="Approved" {{ $leaveRequest->status=='Approved'?'selected':'' }}>Approved</option>
                    <option value="Rejected" {{ $leaveRequest->status=='Rejected'?'selected':'' }}>Rejected</option>
                </select>
            </div>

        </div>

        <button class="btn btn-success mt-3">Update Leave Request</button>
    </form>
</div>
@endsection
