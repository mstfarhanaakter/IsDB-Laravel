@extends('layouts.app')
@section('title', 'Category Index')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>👔 All Employees</h4>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Add Employee</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $key => $emp)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($emp->photo)
                                    <img src="{{ asset('storage/'.$emp->photo) }}" alt="Photo" class="rounded" width="45" height="45">
                                @else
                                    <img src="https://via.placeholder.com/45" class="rounded">
                                @endif
                            </td>
                            <td>{{ $emp->name }}</td>
                            <td>{{ $emp->department->name ?? '-' }}</td>
                            <td>{{ $emp->designation }}</td>
                            <td>{{ number_format($emp->salary, 2) }}</td>
                            <td>
                                <span class="badge 
                                    @if($emp->status == 'Active') bg-success 
                                    @elseif($emp->status == 'Inactive') bg-warning 
                                    @else bg-danger @endif">
                                    {{ $emp->status }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center">No employees found!</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>

@endsection