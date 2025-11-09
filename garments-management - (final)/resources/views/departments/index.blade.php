@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Departments</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add New Department</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->description ?? '-' }}</td>
                <td>
                    <a href="{{ route('departments.show', $department) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No departments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $departments->links() }}
</div>
@endsection
