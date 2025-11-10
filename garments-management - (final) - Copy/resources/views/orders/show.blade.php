@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>

    <div class="card">
        <div class="card-body">
            <h5>Order Number: <strong>{{ $order->order_number }}</strong></h5>
            <p><strong>Buyer:</strong> {{ $order->buyer->name ?? 'N/A' }}</p>
            <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
            <p><strong>Delivery Date:</strong> {{ $order->delivery_date ?? '-' }}</p>
            <p><strong>Total Quantity:</strong> {{ $order->total_qty }}</p>
            <p><strong>Status:</strong> <span class="badge bg-info text-dark">{{ ucfirst($order->status) }}</span></p>
            <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
            <p><strong>Last Updated:</strong> {{ $order->updated_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
