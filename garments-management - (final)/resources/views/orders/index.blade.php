@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Orders List</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-success">Add Order</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Order No</th>
            <th>Buyer</th>
            <th>Order Date</th>
            <th>Delivery Date</th>
            <th>Total Qty</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_no }}</td>
                <td>{{ $order->buyer->name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->delivery_date ?? '-' }}</td>
                <td>{{ $order->total_qty }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $order->status)) }}</td>
                <td class="text-center">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete this order?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No orders found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $orders->links() }}
</div>
@endsection
