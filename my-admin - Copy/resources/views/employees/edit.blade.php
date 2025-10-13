@extends('layouts.app')
@section('title', 'Category Index')
@section('content')

<div class="container mt-4">
    <h4 class="mb-3">✏️ Edit Employee</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department *</label>
                            <select name="department_id" class="form-select" required>
                                @foreach($departments as $dep)
                                    <option value="{{ $dep->id }}" {{ $employee->department_id == $dep->id ? 'selected' : '' }}>
                                        {{ $dep->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Designation *</label>
                            <input type="text" name="designation" class="form-control" value="{{ $employee->designation }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Salary (৳)</label>
                            <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" step="0.01">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ $employee->address }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Photo</label><br>
                            @if($employee->photo)
                                <img src="{{ asset('storage/'.$employee->photo) }}" alt="" width="70" class="rounded mb-2">
                            @endif
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $employee->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Terminated" {{ $employee->status == 'Terminated' ? 'selected' : '' }}>Terminated</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-success">Update Employee</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection