@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Productions</h1>
        <div>
            <a href="{{ route('productions.create') }}" class="btn btn-primary me-2">
                <i class="fas fa-plus-circle"></i> Add Production
            </a>
            <a href="{{ route('productions.work_progress') }}" class="btn btn-success">
                <i class="fas fa-tasks"></i> Work Progress
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Productions Table Card -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Order No</th>
                            <th>Production Line</th>
                            <th>Production Date</th>
                            <th>Planned Qty</th>
                            <th>Produced Qty</th>
                            <th>Defect Qty</th>
                            <th>Completed</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productions as $production)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $production->order->order_number ?? '-' }}</td>
                                <td>{{ $production->line->name ?? '-' }}</td>
                                <td>{{ $production->production_date ? $production->production_date->format('d-m-Y') : '-' }}</td>
                                <td>{{ $production->planned_qty }}</td>
                                <td>{{ $production->produced_qty ?? 0 }}</td>
                                <td>{{ $production->defect_qty ?? 0 }}</td>
                                <td>
                                    @if($production->is_completed)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-warning text-dark">No</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('productions.show', $production->id) }}" class="btn btn-info btn-sm" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('productions.destroy', $production->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this production?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">No production records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
