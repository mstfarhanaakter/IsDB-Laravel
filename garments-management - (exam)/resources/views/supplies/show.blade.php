@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">👁 View Supply #{{ $supply->id }}</h2>

    <div class="card shadow-sm p-4">
        <div class="mb-3"><strong>Supplier:</strong> {{ $supply->supplier->name ?? 'N/A' }}</div>
        <div class="mb-3"><strong>Name:</strong> {{ $supply->name }}</div>
        <div class="mb-3"><strong>Quantity:</strong> {{ $supply->quantity }}</div>
        <div class="mb-3"><strong>Price:</strong> ${{ number_format($supply->price, 2) }}</div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('supplies.index') }}" class="btn btn-secondary">← Back</a>
            <a href="{{ route('supplies.edit', $supply->id) }}" class="btn btn-warning">✏️ Edit</a>
        </div>
    </div>
</div>
@endsection
