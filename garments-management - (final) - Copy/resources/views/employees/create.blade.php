@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Employee</h2>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>First Name *</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name *</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Email *</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Department *</label>
                <select name="department_id" class="form-control" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Position</label>
                <input type="text" name="position" class="form-control">
            </div>

        </div>

        <button class="btn btn-primary mt-3">Save Employee</button>
    </form>
</div>
@endsection
