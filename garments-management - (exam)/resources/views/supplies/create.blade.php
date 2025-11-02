@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">➕ Add New Supply</h2>

    <form action="{{ route('supplies.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                <option value="">-- Select Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
            @error('supplier_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Supply Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('supplies.index') }}" class="btn btn-secondary">← Back</a>
            <button type="submit" class="btn btn-success">💾 Save Supply</button>
        </div>
    </form>
</div>
@endsection
