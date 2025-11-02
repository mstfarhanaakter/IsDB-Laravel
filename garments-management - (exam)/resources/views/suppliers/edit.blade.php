@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">✏️ Edit Supplier #{{ $supplier->id }}</h2>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $supplier->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $supplier->email) }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $supplier->phone) }}">
            @error('phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control">{{ old('address', $supplier->address) }}</textarea>
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">← Back</a>
            <button type="submit" class="btn btn-warning">💾 Update Supplier</button>
        </div>
    </form>
</div>
@endsection
