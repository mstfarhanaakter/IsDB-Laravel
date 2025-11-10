@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Material</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Material Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit') }}" required>
        </div>

        <div class="mb-3">
            <label for="current_stock" class="form-label">Current Stock</label>
            <input type="number" step="0.01" name="current_stock" id="current_stock" class="form-control" value="{{ old('current_stock', 0) }}" required>
        </div>

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select">
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Material</button>
        <a href="{{ route('materials.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
