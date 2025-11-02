@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">➕ Add New Order</h2>

    <form action="{{ route('orders.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="buyer_id" class="form-label">Buyer</label>
            <select name="buyer_id" id="buyer_id" class="form-select" required>
                <option value="">-- Select Buyer --</option>
                @foreach($buyers as $buyer)
                    <option value="{{ $buyer->id }}" {{ old('buyer_id') == $buyer->id ? 'selected' : '' }}>
                        {{ $buyer->name }}
                    </option>
                @endforeach
            </select>
            @error('buyer_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <input type="text" id="product" name="product" class="form-control" value="{{ old('product') }}" required>
            @error('product')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" min="1" required>
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01" min="0" required>
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">← Back</a>
            <button type="submit" class="btn btn-success">💾 Save Order</button>
        </div>
    </form>
</div>
@endsection
