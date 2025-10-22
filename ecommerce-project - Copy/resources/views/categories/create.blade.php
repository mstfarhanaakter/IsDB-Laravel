@extends('layouts.app')
@section('title', 'Create Product')
@section('content')

<!-- Page Header -->
<div class="text-center mb-4">
    <h4>Please Insert Product</h4>
</div>

<!-- Create Product Form Card -->
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- Product Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <!-- Old Price & New Price -->
            <div class="mb-3 row">
                <div class="col">
                    <label for="old_price" class="form-label">Old Price</label>
                    <input type="number" step="0.01" name="old_price" class="form-control" value="{{ old('old_price') }}">
                </div>
                <div class="col">
                    <label for="new_price" class="form-label">New Price</label>
                    <input type="number" step="0.01" name="new_price" class="form-control" value="{{ old('new_price') }}" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>

@endsection
