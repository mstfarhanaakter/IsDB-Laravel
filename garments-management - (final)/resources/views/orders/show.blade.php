@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h4>Order Details</h4>
    </div>
    <div class="card-body">
        <p><strong>Order Number:</strong> {{ $order->order_no }}</p>
        <p><strong>Buyer:</strong> {{ $order->buyer->name }}</p>
        <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
        <p><strong>Delivery Date:</strong> {{ $order->delivery_date ?? '-' }}</p>
        <p><strong>Total Quantity:</strong> {{ $order->total_qty }}</p>
        <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $order->status)) }}</p>

        <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</div>
@endsection
