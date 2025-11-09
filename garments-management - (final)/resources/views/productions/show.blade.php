@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4">Production Details #{{ $production->id }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6">
                    <strong>Order:</strong> {{ $production->order->order_no ?? 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Department:</strong> {{ $production->department->name ?? 'N/A' }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($production->start_date)->format('Y-m-d') }}
                </div>
                <div class="col-md-6">
                    <strong>End Date:</strong> {{ $production->end_date ? \Carbon\Carbon::parse($production->end_date)->format('Y-m-d') : '-' }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <strong>Produced Quantity:</strong> {{ $production->completed_qty }}
                </div>
                <div class="col-md-6">
                    <strong>Status:</strong>
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
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('productions.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning">Edit Production</a>
    </div>
</div>
@endsection
