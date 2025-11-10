@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Production List</h1>
        <a href="{{ route('productions.create') }}" class="btn btn-primary">+ Add Production</a>
    </div>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($productions->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Order No</th>
                        <th>Production Line</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Produced Qty</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productions as $production)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $production->order->order_no ?? 'N/A' }}</td>
                            <td>{{ $production->department->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($production->start_date)->format('Y-m-d') }}</td>
                            <td>{{ $production->end_date ? \Carbon\Carbon::parse($production->end_date)->format('Y-m-d') : '-' }}</td>
                            <td>{{ $production->completed_qty }}</td>
                            <td>
                                @php
                                    $statusClasses = [
                                        'not_started' => 'badge bg-secondary',
                                        'ongoing' => 'badge bg-warning text-dark',
                                        'completed' => 'badge bg-success',
                                    ];
                                @endphp
                                <span class="{{ $statusClasses[$production->status] ?? 'badge bg-secondary' }}">
                                    {{ ucfirst(str_replace('_', ' ', $production->status)) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('productions.show', $production->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('productions.destroy', $production->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this production?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">
            No productions found. <a href="{{ route('productions.create') }}" class="alert-link">Create a new production</a>.
        </div>
    @endif
</div>
@endsection
