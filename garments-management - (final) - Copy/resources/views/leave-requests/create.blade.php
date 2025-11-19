@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Leave Request</h2>

    <form action="{{ route('leave-requests.store') }}" method="POST">
        @csrf
        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Employee *</label>
                <select name="employee_id" class="form-control" required>
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label>Start Date *</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="col-md-3 mb-3">
                <label>End Date *</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <div class="col-md-12 mb-3">
                <label>Reason *</label>
                <textarea name="reason" class="form-control" rows="3" required></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Status *</label>
                <select name="status" class="form-control" required>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>

        </div>

        <button class="btn btn-primary mt-3">Submit Leave Request</button>
    </form>
</div>
@endsection
