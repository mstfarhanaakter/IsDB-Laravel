@extends('layout.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">📦 All Orders</h2>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">+ Add New Order</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info">
            No orders found. <a href="{{ route('orders.create') }}">Create a new order</a>.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Buyer</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->buyer->name ?? 'N/A' }}</td>
                            <td>{{ $order->product }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>${{ number_format($order->price, 2) }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status === 'Pending') bg-warning text-dark 
                                    @elseif($order->status === 'Completed') bg-success 
                                    @elseif($order->status === 'Cancelled') bg-danger 
                                    @else bg-secondary 
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-info">👁 View</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-outline-warning">✏️ Edit</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this order?')">🗑 Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
