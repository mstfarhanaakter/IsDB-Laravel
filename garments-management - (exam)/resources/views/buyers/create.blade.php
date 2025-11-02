@extends('layout.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">➕ Add New Buyer</h2>

    <form action="{{ route('buyers.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="organization_name" class="form-label">Organization Name</label>
            <input type="text" id="organization_name" name="organization_name" class="form-control" value="{{ old('organization_name') }}" required>
            @error('organization_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Buyer Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
            @error('phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('buyers.index') }}" class="btn btn-secondary">← Back</a>
            <button type="submit" class="btn btn-success">💾 Save Buyer</button>
        </div>
    </form>
</div>
@endsection
