@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Purchase Order #{{ $purchaseOrder->id }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Supplier:</strong> {{ $purchaseOrder->supplier->name ?? '-' }}</p>
            <p><strong>Order Date:</strong> {{ $purchaseOrder->order_date }}</p>
            <p><strong>Total Amount:</strong> {{ $purchaseOrder->total_amount }}</p>
            <p><strong>Status:</strong> {{ $purchaseOrder->status }}</p>
        </div>
    </div>

    <h4>Items</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Material</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseOrder->items as $item)
            <tr>
                <td>{{ $item->material->name ?? '-' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('purchase-orders.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
