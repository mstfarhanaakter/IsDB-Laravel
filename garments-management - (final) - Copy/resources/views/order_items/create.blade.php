@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add Order Item</h2>

    <form action="{{ route('order_items.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Order</label>
            <select name="order_id" class="form-select" required>
                <option value="">-- Select Order --</option>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                @endforeach
            </select>
            @error('order_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Product</label>
            <select name="product_id" class="form-select" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" value="{{ old('quantity', 1) }}" required>
            @error('quantity') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Price (Each)</label>
            <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ old('price') }}" required>
            @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('order_items.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
