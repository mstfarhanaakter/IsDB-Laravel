@extends('layouts.app')

@section('content')
<div class="container">
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
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Order No</th>
                        <th>Prouction Line</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Produced Qty</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productions as $production)
                        <tr>
                            <td>{{ $production->id }}</td>
                            <td>{{ $production->order->order_no ?? 'N/A' }}</td>
                            <td>{{ $production->department->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($production->start_date)->format('Y-m-d') }}</td>
                            <td>{{ $production->end_date ? \Carbon\Carbon::parse($production->end_date)->format('Y-m-d') : '-' }}</td>
                            <td>{{ $production->completed_qty }}</td>
                            <td>
                                @switch($production->status)
                                    @case('not_started')
                                        <span class="badge bg-secondary">Not Started</span>
                                        @break
                                    @case('ongoing')
                                        <span class="badge bg-warning text-dark">Ongoing</span>
                                        @break
                                    @case('completed')
                                        <span class="badge bg-success">Completed</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                <a href="{{ route('productions.show', $production->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('productions.destroy', $production->id) }}" method="POST" class="d-inline-block" 
                                      onsubmit="return confirm('Are you sure you want to delete this production?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            No productions found. <a href="{{ route('productions.create') }}" class="alert-link">Create a new production</a>.
        </div>
    @endif
</div>
@endsection
