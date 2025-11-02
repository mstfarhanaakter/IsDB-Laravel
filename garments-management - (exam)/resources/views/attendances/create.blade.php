@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="mb-4">
        <h2>Add Attendance</h2>
        <a href="{{ route('attendances.index') }}" class="btn btn-secondary btn-sm mt-2">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    {{-- Employee --}}
                    <div class="col-md-6">
                        <label for="employee_id" class="form-label">Employee</label>
                        <select name="employee_id" id="employee_id" class="form-select" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Date --}}
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                    </div>

                    {{-- Check In --}}
                    <div class="col-md-6">
                        <label for="check_in" class="form-label">Check In</label>
                        <input type="time" name="check_in" id="check_in" class="form-control" value="{{ old('check_in') }}">
                    </div>

                    {{-- Check Out --}}
                    <div class="col-md-6">
                        <label for="check_out" class="form-label">Check Out</label>
                        <input type="time" name="check_out" id="check_out" class="form-control" value="{{ old('check_out') }}">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="Present" {{ old('status') == 'Present' ? 'selected' : '' }}>Present</option>
                            <option value="Absent" {{ old('status') == 'Absent' ? 'selected' : '' }}>Absent</option>
                            <option value="Late" {{ old('status') == 'Late' ? 'selected' : '' }}>Late</option>
                            <option value="On Leave" {{ old('status') == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                        </select>
                    </div>

                    {{-- Remarks --}}
                    <div class="col-md-6">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" name="remarks" id="remarks" class="form-control" value="{{ old('remarks') }}">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Add Attendance
                    </button>
                    <a href="{{ route('attendances.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
