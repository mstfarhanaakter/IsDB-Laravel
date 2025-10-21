@extends('layout.app')

@section('title', 'Edit Department')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Department</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $department->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Employee Number</label>
            <input type="text" name="employee_no" class="form-control" value="{{ old('employee_no', $department->employee_no) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Department</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
