@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Orders</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">+ New Order</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Order Number</th>
                <th>Buyer</th>
                <th>Order Date</th>
                <th>Delivery Date</th>
                <th>Status</th>
                <th>Total Qty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->buyer->name ?? 'N/A' }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->delivery_date ?? '-' }}</td>
                <td><span class="badge bg-info text-dark">{{ ucfirst($order->status) }}</span></td>
                <td>{{ $order->total_qty }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                            Delete
                        </button>
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
</div>
@endsection
