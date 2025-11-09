@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Purchase Item Details</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $purchaseItem->id }}</p>
            <p><strong>Material:</strong> {{ $purchaseItem->material->name }}</p>
            <p><strong>Supplier:</strong> {{ $purchaseItem->supplier->name }}</p>
            <p><strong>Quantity:</strong> {{ $purchaseItem->quantity }}</p>
            <p><strong>Unit Price:</strong> {{ $purchaseItem->unit_price }}</p>
            <p><strong>Total:</strong> {{ $purchaseItem->total }}</p>
            <p><strong>Status:</strong> {{ $purchaseItem->status }}</p>
            <p><strong>Purchase Order ID:</strong> {{ $purchaseItem->purchaseOrder->id ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('purchase-items.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
