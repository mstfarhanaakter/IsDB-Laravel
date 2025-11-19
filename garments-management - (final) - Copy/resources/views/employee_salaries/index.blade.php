@extends('layouts.app')

@section('content')
<div class="container mt-3">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Employee Salaries</h3>
                <a href="{{ route('employee-salaries.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Salary
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Gross Salary</th>
                            <th>Net Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salaries as $salary)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                                <td>{{ \Carbon\Carbon::createFromDate(null, $salary->month, 1)->format('F') }}</td>
                                <td>{{ $salary->year }}</td>
                                <td>{{ number_format($salary->gross_salary, 2) }}</td>
                                <td>{{ number_format($salary->net_salary, 2) }}</td>
                                <td>
                                    <a href="{{ route('employee-salaries.show', $salary->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('employee-salaries.edit', $salary->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('employee-salaries.destroy', $salary->id) }}" 
                                          method="POST" class="d-inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this salary?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No salary records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
