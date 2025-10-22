@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')

<!-- Page Header -->
<div class="text-center mb-4">
    <h4>Update Category</h4>
</div>

<!-- Edit Form Card -->
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('editStore') }}">
            @csrf
            <input type="hidden" name="catagory_id" value="{{ $cat->id }}">

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required value="{{ $cat->name }}">
            </div>

            <!-- Details -->
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <input type="text" name="details" class="form-control" required value="{{ $cat->details }}">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Update Category</button>
        </form>
    </div>
</div>

@endsection
