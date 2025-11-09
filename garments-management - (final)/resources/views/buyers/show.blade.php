@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h4>Buyer Details</h4>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $buyer->name }}</p>
        <p><strong>Company Name:</strong> {{ $buyer->company_name ?? '-' }}</p>
        <p><strong>Contact Number:</strong> {{ $buyer->contact_no ?? '-' }}</p>
        <p><strong>Email:</strong> {{ $buyer->email }}</p>
        <p><strong>Address:</strong> {{ $buyer->address ?? '-' }}</p>
        <a href="{{ route('buyers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</div>
@endsection
