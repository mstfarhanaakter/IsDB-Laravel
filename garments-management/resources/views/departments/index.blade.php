@extends('layout.app')  <!-- layout folder ঠিক করে দিন -->

@section('title', 'Departments - Garments Management')

@section('content')
<div class="container">
    <h2 class="mb-3">Departments</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add New Department</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th>#</th>
                <th>Department Name</th>
                <th>Number of Employees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->employee_no}}</td> <!-- relation with employees -->
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No departments found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
