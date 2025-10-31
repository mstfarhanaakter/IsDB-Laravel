@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Material</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.update', $material) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $material->name) }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $material->category) }}">
        </div>

        <div class="mb-3">
            <label>Unit</label>
            <input type="text" name="unit" class="form-control" value="{{ old('unit', $material->unit) }}">
        </div>

        <div class="mb-3">
            <label>Opening Stock</label>
            <input type="number" step="0.01" name="opening_stock" class="form-control" value="{{ old('opening_stock', $material->opening_stock) }}">
        </div>

        <div class="mb-3">
            <label>Current Stock</label>
            <input type="number" step="0.01" name="current_stock" class="form-control" value="{{ old('current_stock', $material->current_stock) }}">
        </div>

        <div class="mb-3">
            <label>Reorder Level</label>
            <input type="number" step="0.01" name="reorder_level" class="form-control" value="{{ old('reorder_level', $material->reorder_level) }}">
        </div>

        <div class="mb-3">
            <label>Supplier</label>
            <select name="supplier_id" class="form-control">
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $material->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('materials.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
