@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Employees</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Add Employee</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Joining Date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $emp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->phone }}</td>
                    <td>{{ $emp->department->name ?? '-' }}</td>
                    <td>{{ $emp->salary }}</td>
                    <td>{{ $emp->joining_date }}</td>
                    <td class="text-center">
                        <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                        <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No employees found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
