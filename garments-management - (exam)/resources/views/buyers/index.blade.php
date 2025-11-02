@extends('layout.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">👥 All Buyers</h2>
        <a href="{{ route('buyers.create') }}" class="btn btn-primary">+ Add Buyer</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($buyers->isEmpty())
        <div class="alert alert-info">
            No buyers found. <a href="{{ route('buyers.create') }}">Add a new buyer</a>.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Organization Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buyers as $buyer)
                        <tr>
                            <td>{{ $buyer->id }}</td>
                            <td>{{ $buyer->organization_name }}</td>
                            <td>{{ $buyer->name }}</td>
                            <td>{{ $buyer->email }}</td>
                            <td>{{ $buyer->phone }}</td>
                            <td class="text-center">
                                <a href="{{ route('buyers.show', $buyer->id) }}" class="btn btn-sm btn-outline-info">
                                    👁 View
                                </a>
                                <a href="{{ route('buyers.edit', $buyer->id) }}" class="btn btn-sm btn-outline-warning">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('buyers.destroy', $buyer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this buyer?')">
                                        🗑 Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
