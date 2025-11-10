@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Order Item</h2>

    <form action="{{ route('order_items.update', $orderItem) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Order</label>
            <select name="order_id" class="form-select" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" {{ $orderItem->order_id == $order->id ? 'selected' : '' }}>
                        {{ $order->order_number }}
                    </option>
                @endforeach
            </select>
            @error('order_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Product</label>
            <select name="product_id" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $orderItem->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" value="{{ $orderItem->quantity }}" required>
            @error('quantity') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Price (Each)</label>
            <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ $orderItem->price }}" required>
            @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('order
