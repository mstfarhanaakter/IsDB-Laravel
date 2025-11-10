@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Order Item Details</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Order:</strong> {{ $orderItem->order->order_number ?? 'N/A' }}</p>
            <p><strong>Product:</strong> {{ $orderItem->product->name ?? 'N/A' }}</p>
            <p><strong>Quantity:</strong> {{ $orderItem->quantity }}</p>
            <p><strong>Price (Each):</strong> ${{ number_format($orderItem->price, 2) }}</p>
            <p><strong>Total:</strong> ${{ number_format($orderItem->quantity * $orderItem->price, 2) }}</p>
            <p><strong>Created:</strong> {{ $orderItem->created_at->format('Y-m-d H:i') }}</p>
            <p><strong>Last Updated:</strong> {{ $orderItem->updated_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('order_items.edit', $orderItem) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('order_items.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
