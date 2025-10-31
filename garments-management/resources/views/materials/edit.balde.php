@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Raw Material</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.update', $rawmaterial) }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $rawmaterial->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $rawmaterial->category) }}" required>
        </div>

        <div class="mb-3">
            <label>Unit</label>
            <input type="text" name="unit" class="form-control" value="{{ old('unit', $rawmaterial->unit) }}" required>
        </div>

        <div class="mb-3">
            <label>Opening Stock</label>
            <input type="number" step="0.01" name="opening_stock" class="form-control" value="{{ old('opening_stock', $rawmaterial->opening_stock) }}" required>
        </div>

        <div class="mb-3">
            <label>Current Stock</label>
            <input type="number" step="0.01" name="current_stock" class="form-control" value="{{ old('current_stock', $rawmaterial->current_stock) }}" required>
        </div>

        <div class="mb-3">
            <label>Reorder Level</label>
            <input type="number" step="0.01" name="reorder_level" class="form-control" value="{{ old('reorder_level', $rawmaterial->reorder_level) }}" required>
        </div>

        <div class="mb-3">
            <label>Supplier</label>
            <select name="supplier_id" class="form-control">
                <option value="">Select Supplier (optional)</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $rawmaterial->supplier_id == $supplier->id ? 'selected' : '' }}>
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
