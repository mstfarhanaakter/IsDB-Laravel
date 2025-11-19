@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Employee List</h3>

                <a href="{{ route('employees.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Employee
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td class="fw-semibold">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $employee->department->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>{{ $employee->position }}</td>

                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}" 
                                       class="btn btn-sm btn-outline-info">
                                        View
                                    </a>

                                    <a href="{{ route('employees.edit', $employee->id) }}" 
                                       class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('employees.destroy', $employee->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this employee?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-outline-danger" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    No employees found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
