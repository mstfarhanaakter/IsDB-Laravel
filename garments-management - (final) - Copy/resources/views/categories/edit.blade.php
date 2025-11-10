@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Back to Categories</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($category->image)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->name }}" width="120" class="img-thumbnail">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-warning">Update Category</button>
        </form>
    </div>
</div>
@endsection
