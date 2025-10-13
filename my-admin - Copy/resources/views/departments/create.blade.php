@extends('layouts.app')
@section('title', 'Category Index')
@section('content')

<div class="container mt-4">
    <h4 class="mb-3">➕ Add New Department</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Department Name *</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Sewing, Cutting, Finishing" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Short description about this department"></textarea>
                </div>

                <div class="text-end">
                    <button class="btn btn-success">Save Department</button>
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection