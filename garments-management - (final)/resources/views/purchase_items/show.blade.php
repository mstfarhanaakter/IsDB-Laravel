@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Purchase Item Details</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4"><strong>#</strong></div>
                <div class="col-md-8">{{ $purchaseItem->id }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>Material:</strong></div>
                <div class="col-md-8">{{ $purchaseItem->material->name }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>Supplier:</strong></div>
                <div class="col-md-8">{{ $purchaseItem->supplier->name }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>Quantity:</strong></div>
                <div class="col-md-8">{{ $purchaseItem->quantity }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>Unit Price:</strong></div>
                <div class="col-md-8">{{ $purchaseItem->unit_price }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>Total:</strong></div>
                <div class="col-md-8">{{ $purchaseItem->total }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>Status:</strong></div>
                <div class="col-md-8">
                    @php
                        $statusClass = match($purchaseItem->status) {
                            'pending' => 'badge bg-warning text-dark',
                            'approved' => 'badge bg-success',
                            'rejected' => 'badge bg-danger',
                            default => 'badge bg-secondary',
                        };
                    @endphp
                    <span class="{{ $statusClass }}">{{ ucfirst($purchaseItem->status) }}</span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4"><strong>Purchase Order ID:</strong></div>
                <div class="col-md-8">{{ $purchaseItem->purchaseOrder->id ?? '-' }}</div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('purchase-items.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('purchase-items.edit', $purchaseItem) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection
