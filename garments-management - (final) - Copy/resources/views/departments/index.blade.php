@extends('layouts.app')

@section('content')
<div class="container mt-3">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Departments</h3>
                <a href="{{ route('departments.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Department
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $department->name }}</td>
                                <td>{{ $department->description ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('departments.show', $department) }}" 
                                       class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('departments.edit', $department) }}" 
                                       class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('departments.destroy', $department) }}" 
                                          method="POST" class="d-inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this department?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No departments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
