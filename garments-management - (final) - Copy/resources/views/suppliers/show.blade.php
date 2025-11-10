@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Supplier Details</h1>

    <div class="card">
        <div class="card-header">
            {{ $supplier->name }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $supplier->id }}</p>
            <p><strong>Contact:</strong> {{ $supplier->contact ?? '-' }}</p>
            <p><strong>Email:</strong> {{ $supplier->email ?? '-' }}</p>
            <p><strong>Address:</strong> {{ $supplier->address ?? '-' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
