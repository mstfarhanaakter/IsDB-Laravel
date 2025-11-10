@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Product Details</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back to Products</a>

    <div class="card p-4">
        <h4>Name: {{ $product->name }}</h4>
        <p><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock Quantity:</strong> {{ $product->stock_quantity }}</p>
        <p><strong>Description:</strong> {{ $product->description ?? 'No Description' }}</p>

        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
