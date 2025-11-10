@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Buyers List</h2>
    <a href="{{ route('buyers.create') }}" class="btn btn-success">Add Buyer</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Company</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($buyers as $buyer)
            <tr>
                <td>{{ $buyer->id }}</td>
                <td>{{ $buyer->name }}</td>
                <td>{{ $buyer->company_name ?? '-' }}</td>
                <td>{{ $buyer->contact_no ?? '-' }}</td>
                <td>{{ $buyer->email }}</td>
                <td>{{ $buyer->address ?? '-' }}</td>
                <td class="text-center">
                    <a href="{{ route('buyers.show', $buyer->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('buyers.edit', $buyer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('buyers.destroy', $buyer->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete this buyer?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No buyers found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $buyers->links() }}
</div>
@endsection
