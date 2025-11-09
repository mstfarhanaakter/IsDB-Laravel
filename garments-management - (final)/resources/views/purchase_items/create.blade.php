@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Purchase Item</h1>

    <form action="{{ route('purchase-items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="material_id" class="form-label">Material</label>
            <select name="material_id" id="material_id" class="form-control" required>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" step="0.01" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Unit Price</label>
            <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('purchase-items.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
