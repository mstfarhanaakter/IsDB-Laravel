@extends('layouts.app')

@section('title', 'View Purchase Item')

@section('content')
<div class="container mt-4">
    <h2>Purchase Item Details</h2>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Material:</strong> {{ $purchaseItem->material->name ?? '—' }}</p>
            <p><strong>Supplier:</strong> {{ $purchaseItem->supplier->name ?? '—' }}</p>
            <p><strong>Quantity:</strong> {{ $purchaseItem->quantity }}</p>
            <p><strong>Unit Price:</strong> ৳{{ number_format($purchaseItem->unit_price, 2) }}</p>
            <p><strong>Total:</strong> ৳{{ number_format($purchaseItem->quantity * $purchaseItem->unit_price, 2) }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('purchase-items.edit', $purchaseItem->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('purchase-items.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
