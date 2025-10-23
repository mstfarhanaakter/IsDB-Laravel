@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-white mb-4">Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card bg-dark text-light shadow-sm">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control mb-2" id="image" name="image">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;" class="rounded">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3 row">
                    <div class="col">
                        <label for="old_price" class="form-label">Old Price</label>
                        <input type="number" step="0.01" class="form-control" id="old_price" name="old_price" value="{{ old('old_price', $product->old_price) }}">
                    </div>
                    <div class="col">
                        <label for="new_price" class="form-label">New Price</label>
                        <input type="number" step="0.01" class="form-control" id="new_price" name="new_price" value="{{ old('new_price', $product->new_price) }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">
                    <i class="bi bi-pencil-square me-1"></i> Update Product
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
