@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Purchase Order</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('purchase_orders.store') }}" method="POST">
        @csrf

        <!-- Supplier Selection -->
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror">
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Order Date -->
        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" name="order_date" id="order_date" class="form-control @error('order_date') is-invalid @enderror" value="{{ old('order_date', date('Y-m-d')) }}">
            @error('order_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Items Table (Fixed 5 rows for simplicity) -->
        <h5 class="mt-4">Items</h5>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Material Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 5; $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            <input type="text" name="items[{{ $i }}][material_name]" class="form-control" value="{{ old("items.$i.material_name") }}" placeholder="Material Name">
                        </td>
                        <td>
                            <input type="number" name="items[{{ $i }}][quantity]" class="form-control" value="{{ old("items.$i.quantity") }}" placeholder="Quantity" min="0">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Save Purchase Order</button>
        <a href="{{ route('purchase_orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
