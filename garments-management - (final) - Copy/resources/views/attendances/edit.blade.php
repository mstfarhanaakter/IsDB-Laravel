@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Attendance</h2>

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Employee *</label>
                <select name="employee_id" class="form-control" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" 
                            {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Date *</label>
                <input type="date" name="date" class="form-control" value="{{ $attendance->date }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Status *</label>
                <select name="status" class="form-control" required>
                    <option value="Present" {{ $attendance->status=='Present'?'selected':'' }}>Present</option>
                    <option value="Absent" {{ $attendance->status=='Absent'?'selected':'' }}>Absent</option>
                    <option value="Leave" {{ $attendance->status=='Leave'?'selected':'' }}>Leave</option>
                </select>
            </div>

        </div>

        <button class="btn btn-success mt-3">Update Attendance</button>
    </form>
</div>
@endsection
