@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Salary Sheets</h3>
                <a href="{{ route('salaries.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Generate Salary
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Employee</th>
                            <th>Month</th>
                            <th>Gross Salary</th>
                            <th>Net Salary</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salaries as $salary)
                            <tr>
                                <td class="fw-semibold">{{ $salary->employee->full_name ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::createFromDate($salary->year, $salary->month, 1)->format('F, Y') }}</td>
                                <td>{{ number_format($salary->gross_salary, 2) }}</td>
                                <td>{{ number_format($salary->net_salary, 2) }}</td>
                                <td>
                                    <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('salaries.pdf', $salary->id) }}" class="btn btn-sm btn-outline-success">PDF</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No salary records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $salaries->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
