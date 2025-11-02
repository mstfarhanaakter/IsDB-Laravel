@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">👁 View Supplier #{{ $supplier->id }}</h2>

    <div class="card shadow-sm p-4">
        <div class="mb-3"><strong>Name:</strong> {{ $supplier->name }}</div>
        <div class="mb-3"><strong>Email:</strong> {{ $supplier->email ?? 'N/A' }}</div>
        <div class="mb-3"><strong>Phone:</strong> {{ $supplier->phone ?? 'N/A' }}</div>
        <div class="mb-3"><strong>Address:</strong> {{ $supplier->address ?? 'N/A' }}</div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">← Back</a>
            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">✏️ Edit</a>
        </div>
    </div>
</div>
@endsection
