@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Category Details</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Back to Categories</a>

    <div class="card p-4">
        <h4 class="mb-3">Name: {{ $category->name }}</h4>

        <div class="mb-3">
            <strong>Image:</strong>
            <div class="mt-2">
                @if($category->image)
                    <img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->name }}" width="200" class="img-thumbnail">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </div>
        </div>

        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
