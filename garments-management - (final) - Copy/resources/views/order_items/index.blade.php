@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Order Items</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add New --}}
    <a href="{{ route('order_items.create') }}" class="btn btn-primary mb-3">+ Add Order Item</a>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price (Each)</th>
                        <th>Total</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orderItems as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->order->order_number ?? 'N/A' }}</td>
                            <td>{{ $item->product->name ?? 'N/A' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <a href="{{ route('order_items.show', $item) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('order_items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('order_items.destroy', $item) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted p-3">No order items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
