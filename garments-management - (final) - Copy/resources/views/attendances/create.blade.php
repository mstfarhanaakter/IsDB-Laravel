@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Attendance</h2>

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Employee *</label>
                <select name="employee_id" class="form-control" required>
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Date *</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Status *</label>
                <select name="status" class="form-control" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Leave">Leave</option>
                </select>
            </div>

        </div>

        <button class="btn btn-primary mt-3">Save Attendance</button>
    </form>
</div>
@endsection
