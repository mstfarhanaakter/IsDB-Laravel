@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">👁 View Buyer #{{ $buyer->id }}</h2>

    <div class="card shadow-sm p-4">
        <div class="mb-3"><strong>Organization Name:</strong> {{ $buyer->organization_name }}</div>
        <div class="mb-3"><strong>Name:</strong> {{ $buyer->name }}</div>
        <div class="mb-3"><strong>Email:</strong> {{ $buyer->email }}</div>
        <div class="mb-3"><strong>Phone:</strong> {{ $buyer->phone }}</div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('buyers.index') }}" class="btn btn-secondary">← Back</a>
            <a href="{{ route('buyers.edit', $buyer->id) }}" class="btn btn-warning">✏️ Edit</a>
        </div>
    </div>
</div>
@endsection
