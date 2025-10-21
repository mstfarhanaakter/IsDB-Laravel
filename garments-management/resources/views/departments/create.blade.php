@extends('layout.app')  <!-- layouts folder ঠিক আছে কি চেক করুন -->

@section('title', 'Add Department')

@section('content')
<div class="container">
    <h2 class="mb-3">Add New Department</h2>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Department create form --}}
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Employees</label>
            <input type="number" name="employee_no" class="form-control" value="{{ old('employee_no', 0) }}" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Department</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
