@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Employee</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>First Name *</label>
                <input type="text" name="first_name" class="form-control"
                       value="{{ $employee->first_name }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name *</label>
                <input type="text" name="last_name" class="form-control"
                       value="{{ $employee->last_name }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Email *</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $employee->email }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ $employee->phone }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Department *</label>
                <select name="department_id" class="form-control" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Position</label>
                <input type="text" name="position" class="form-control"
                       value="{{ $employee->position }}">
            </div>

        </div>

        <button class="btn btn-success mt-3">Update Employee</button>
    </form>
</div>
@endsection
