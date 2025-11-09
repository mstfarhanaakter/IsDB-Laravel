@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Purchase Item</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('purchase-items.update', $purchaseItem) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="material_id" class="form-label">Material</label>
                <select name="material_id" id="material_id" class="form-control" required>
                    @foreach($materials as $material)
                        <option value="{{ $material->id }}" {{ $purchaseItem->material_id == $material->id ? 'selected' : '' }}>
                            {{ $material->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $purchaseItem->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" step="0.01" name="quantity" id="quantity" class="form-control" value="{{ $purchaseItem->quantity }}" required>
            </div>

            <div class="col-md-6">
                <label for="unit_price" class="form-label">Unit Price</label>
                <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" value="{{ $purchaseItem->unit_price }}" required>
            </div>

            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ $purchaseItem->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $purchaseItem->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $purchaseItem->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('purchase-items.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
