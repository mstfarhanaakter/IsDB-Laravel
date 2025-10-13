@extends('layouts.app')
@section('title', 'Category Index')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>🏭 Departments</h4>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Add Department</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Department Name</th>
                        <th>Description</th>
                        <th>Total Employees</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $key => $dep)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $dep->name }}</td>
                            <td>{{ $dep->description ?? '—' }}</td>
                            <td>{{ $dep->employees->count() ?? 0 }}</td>
                            <td class="text-end">
                                <a href="{{ route('departments.edit', $dep->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('departments.destroy', $dep->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this department?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No departments found!</td></tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $departments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection