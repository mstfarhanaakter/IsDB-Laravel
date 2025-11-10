@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Production Details</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Order:</strong> {{ $production->order->order_number }}</p>
            <p><strong>Department:</strong> {{ $production->department->name }}</p>
            <p><strong>Start Date:</strong> {{ $production->start_date?->format('d M, Y') }}</p>
            <p><strong>End Date:</strong> {{ $production->end_date?->format('d M, Y') ?? '-' }}</p>
            <p><strong>Completed Quantity:</strong> {{ $production->completed_qty }}</p>
            <p><strong>Status:</strong>
                @switch($production->status)
                    @case('not_started')
                        Not Started
                        @break
                    @case('ongoing')
                        Ongoing
                        @break
                    @case('completed')
                        Completed
                        @break
                @endswitch
            </p>
        </div>
    </div>

    <a href="{{ route('productions.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>

@endsection
