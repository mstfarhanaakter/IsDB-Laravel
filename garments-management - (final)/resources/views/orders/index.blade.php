@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">Orders List</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-success shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Add Order
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark text-uppercase small">
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
                        <td class="fw-semibold">{{ $order->order_no }}</td>
                        <td>{{ $order->buyer->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M, Y') }}</td>
                        <td>{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d M, Y') : '-' }}</td>
                        <td>{{ $order->total_qty }}</td>
                        <td>
                            @php
                                $statusColors = [
                                    'pending' => 'secondary',
                                    'approved' => 'success',
                                    'delivered' => 'primary',
                                    'cancelled' => 'danger'
                                ];
                            @endphp
                            <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm me-1" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-end">
    {{ $orders->links('pagination::bootstrap-5') }}
</div>
@endsection
