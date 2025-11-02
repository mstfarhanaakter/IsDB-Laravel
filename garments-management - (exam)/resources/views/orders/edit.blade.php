@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">✏️ Edit Order #{{ $order->id }}</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="buyer_id" class="form-label">Buyer</label>
            <select name="buyer_id" id="buyer_id" class="form-select" required>
                <option value="">-- Select Buyer --</option>
                @foreach($buyers as $buyer)
                    <option value="{{ $buyer->id }}" {{ old('buyer_id', $order->buyer_id) == $buyer->id ? 'selected' : '' }}>
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
            <input type="text" id="product" name="product" class="form-control" value="{{ old('product', $order->product) }}" required>
            @error('product')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $order->quantity) }}" min="1" required>
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $order->price) }}" step="0.01" min="0" required>
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Pending" {{ old('status', $order->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status', $order->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ old('status', $order->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">← Back</a>
            <button type="submit" class="btn btn-warning">💾 Update Order</button>
        </div>
    </form>
</div>
@endsection
