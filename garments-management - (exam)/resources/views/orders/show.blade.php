@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">👁 View Order #{{ $order->id }}</h2>

    <div class="card shadow-sm p-4">
        <div class="mb-3"><strong>Buyer:</strong> {{ $order->buyer->name ?? 'N/A' }}</div>
        <div class="mb-3"><strong>Product:</strong> {{ $order->product }}</div>
        <div class="mb-3"><strong>Quantity:</strong> {{ $order->quantity }}</div>
        <div class="mb-3"><strong>Price:</strong> ${{ number_format($order->price, 2) }}</div>
        <div class="mb-3">
            <strong>Status:</strong>
            <span class="badge 
                @if($order->status === 'Pending') bg-warning text-dark 
                @elseif($order->status === 'Completed') bg-success 
                @elseif($order->status === 'Cancelled') bg-danger 
                @else bg-secondary 
                @endif">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">← Back</a>
            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">✏️ Edit</a>
        </div>
    </div>
</div>
@endsection
