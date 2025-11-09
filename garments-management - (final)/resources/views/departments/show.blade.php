@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Department Details</h1>

    <div class="card">
        <div class="card-header bg-primary text-white">
            {{ $department->name }}
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $department->description ?? 'No description available.' }}</p>
            <p><strong>Created At:</strong> {{ $department->created_at->format('d M, Y H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $department->updated_at->format('d M, Y H:i') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection
