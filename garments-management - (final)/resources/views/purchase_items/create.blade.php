@extends('layouts.app')

@section('title', 'Add Purchase Item')

@section('content')
<div class="container mt-4">
    <h2>Add Purchase Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('purchase-items.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="material_id" class="form-label">Material</label>
            <select name="material_id" id="material_id" class="form-select" required>
                <option value="">Select Material</option>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}" {{ old('material_id') == $material->id ? 'selected' : '' }}>
                        {{ $material->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Unit Price (৳)</label>
            <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" value="{{ old('unit_price') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Item</button>
        <a href="{{ route('purchase-items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
