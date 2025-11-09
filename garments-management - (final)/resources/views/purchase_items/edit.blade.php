@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Purchase Item</h1>

    <form action="{{ route('purchase-items.update', $purchaseItem) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="material_id" class="form-label">Material</label>
            <select name="material_id" id="material_id" class="form-control" required>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}" {{ $purchaseItem->material_id == $material->id ? 'selected' : '' }}>
                        {{ $material->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $purchaseItem->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" step="0.01" name="quantity" id="quantity" class="form-control" value="{{ $purchaseItem->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Unit Price</label>
            <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" value="{{ $purchaseItem->unit_price }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $purchaseItem->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $purchaseItem->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $purchaseItem->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('purchase-items.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
