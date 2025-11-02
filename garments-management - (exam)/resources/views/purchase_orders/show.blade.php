@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">📄 Purchase Order #{{ $purchase_order->id }}</h2>

    <div class="card shadow-sm p-4">
        <table class="table table-bordered mb-0">
            <tr>
                <th>ID</th>
                <td>{{ $purchase_order->id }}</td>
            </tr>
            <tr>
                <th>Supplier</th>
                <td>{{ $purchase_order->supplier->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Supply</th>
                <td>{{ $purchase_order->supply->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $purchase_order->quantity }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>${{ number_format($purchase_order->price, 2) }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="badge 
                        @if($purchase_order->status === 'Pending') bg-warning text-dark
                        @elseif($purchase_order->status === 'Completed') bg-success
                        @elseif($purchase_order->status === 'Cancelled') bg-danger
                        @else bg-secondary
                        @endif">
                        {{ ucfirst($purchase_order->status) }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td>{{ $purchase_order->order_date ? \Carbon\Carbon::parse($purchase_order->order_date)->format('d M Y') : 'N/A' }}</td>
            </tr>
        </table>

        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('purchase_orders.index') }}" class="btn btn-secondary">← Back</a>
            <a href="{{ route('purchase_orders.edit', $purchase_order->id) }}" class="btn btn-warning">✏️ Edit</a>
        </div>
    </div>
</div>
@endsection
