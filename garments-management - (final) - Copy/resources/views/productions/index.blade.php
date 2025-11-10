@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Productions Dashboard</h1>

    <a href="{{ route('productions.create') }}" class="btn btn-success mb-3">Add New Production</a>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($productions->count())
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Order No</th>
                                <th>Department</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Completed Qty</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productions as $index => $production)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $production->order->order_number }}</td>
                                    <td>{{ $production->department->name }}</td>
                                    <td>{{ $production->start_date?->format('d M, Y') }}</td>
                                    <td>{{ $production->end_date?->format('d M, Y') ?? '-' }}</td>
                                    <td>{{ $production->completed_qty }}</td>
                                    <td>
                                        @switch($production->status)
                                            @case('not_started')
                                                <span class="badge bg-warning text-dark">Not Started</span>
                                                @break
                                            @case('ongoing')
                                                <span class="badge bg-info text-dark">Ongoing</span>
                                                @break
                                            @case('completed')
                                                <span class="badge bg-success">Completed</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('productions.show', $production->id) }}" class="btn btn-sm btn-secondary">View</a>
                                        <form action="{{ route('productions.destroy', $production->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="p-3 text-center text-muted">No productions available.</p>
            @endif
        </div>
    </div>
</div>

@endsection
