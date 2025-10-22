@extends('layouts.app')
@section('title', 'Category Management')
@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2 class="fw-bold text-primary">Manage Categories</h2>
    <a href="{{ route('create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-1"></i> Add Category
    </a>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Category Table -->
<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cats as $single)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="fw-bold text-dark">{{ $single->name }}</td>
                            <td>{{ Str::limit($single->details, 50) }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('edit', $single->id) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="category_id" value="{{ $single->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash-fill"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted fst-italic">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
