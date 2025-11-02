@extends('layout.app') <!-- আপনার মূল layout.blade.php অনুযায়ী পরিবর্তন করুন -->

@section('content')
<div class="container mt-4">
    <h2>All Purchase Orders</h2>

    <a href="{{ route('purchase_orders.create') }}" class="btn btn-primary mb-3">+ Add New Purchase Order</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info">No purchase orders found. <a href="{{ route('purchase_orders.create') }}">Create one now</a>.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Supply</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $order->supplier->name ?? 'N/A' }}</td>
                    <td>{{ $order->supply->name ?? 'N/A' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ number_format($order->price, 2) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->order_date ? \Carbon\Carbon::parse($order->order_date)->format('d M Y') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('purchase_orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('purchase_orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('purchase_orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
