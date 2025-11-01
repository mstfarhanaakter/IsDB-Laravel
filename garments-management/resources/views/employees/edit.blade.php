@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-black text-white">
            <h3 class="mb-0 text-white">Edit Employee</h3>
        </div>
        <div class="card-body">
            
            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h5 class="mb-2">Please fix the following errors:</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Left Column --}}
                    <div class="col-md-6">
                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $employee->name) }}" placeholder="Enter full name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $employee->email) }}" placeholder="Enter email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $employee->phone) }}" placeholder="Enter phone number">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Right Column --}}
                    <div class="col-md-6">
                        {{-- Department --}}
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select id="department_id" name="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                <option value="">-- Select Department --</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id) == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Salary --}}
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" id="salary" name="salary" class="form-control @error('salary') is-invalid @enderror"
                                   value="{{ old('salary', $employee->salary) }}" placeholder="Enter salary">
                            @error('salary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Joining Date --}}
                        <div class="mb-3">
                            <label for="joining_date" class="form-label">Joining Date</label>
                            <input type="date" id="joining_date" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror"
                                   value="{{ old('joining_date', $employee->joining_date) }}">
                            @error('joining_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-4 d-flex justify-content-between">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Update Employee</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
