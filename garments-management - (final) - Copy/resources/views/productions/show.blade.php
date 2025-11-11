@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Production Details</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Order Number:</strong> {{ $production->order->order_number }}</p>
            <p><strong>Production Line:</strong> {{ $production->line->name }}</p>
            <p><strong>Production Date:</strong> {{ $production->production_date }}</p>
            <p><strong>Planned Quantity:</strong> {{ $production->planned_qty }}</p>
            <p><strong>Produced Quantity:</strong> {{ $production->produced_qty }}</p>
            <p><strong>Defect Quantity:</strong> {{ $production->defect_qty }}</p>
            <p><strong>Status:</strong> {{ $production->is_completed ? 'Completed' : 'Pending' }}</p>
        </div>
    </div>

    <a href="{{ route('productions.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning mt-3">Edit</a>
</div>
@endsection
