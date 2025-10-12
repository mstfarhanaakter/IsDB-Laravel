@extends('layouts.app')
@section('title', 'Create Category')
@section('content')

<!-- Page Header -->
<div class="text-center mb-4">
    <h4>Please Insert Category</h4>
</div>

<!-- Create Category Form Card -->
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('store') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <!-- Details -->
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <input type="text" name="details" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>

@endsection
