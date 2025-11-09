@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb‑4">Edit Purchase #{{ $purchase->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb‑3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                  <option value="{{ $supplier->id }}"
                    {{ old('supplier_id', $purchase->supplier_id) == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                  </option>
                @endforeach
            </select>
        </div>

        <div class="mb‑3">
            <label for="material_id" class="form-label">Material</label>
            <select name="material_id" id="material_id" class="form-select" required>
                <option value="">Select Material</option>
                @foreach ($materials as $material)
                  <option value="{{ $material->id }}"
                    {{ old('material_id', $purchase->material_id) == $material->id ? 'selected' : '' }}>
                    {{ $material->name }}
                  </option>
                @endforeach
            </select>
        </div>

        <div class="mb‑3">
            <label for="purchase_date" class="form-label">Purchase Date</label>
            <input type="date" name="purchase_date" id="purchase_date"
                   class="form-control"
                   value="{{ old('purchase_date', $purchase->purchase_date->format('Y‑m‑d')) }}" required>
        </div>

        <div class="mb‑3">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="number" step="0.01" name="total_amount" id="total_amount"
                   class="form-control" value="{{ old('total_amount', $purchase->total_amount) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Purchase</button>
        <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
