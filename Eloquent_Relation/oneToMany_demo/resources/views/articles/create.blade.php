@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Create New Article</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf <!-- CSRF Protection -->

        <div class="mb-3">
            <label for="name" class="form-label">Article Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Article Details</label>
            <textarea name="details" id="details" class="form-control" rows="5" required>{{ old('details') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Article</button>
    </form>
</div>
@endsection
