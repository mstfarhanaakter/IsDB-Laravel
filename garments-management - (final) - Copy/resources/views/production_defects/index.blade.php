@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Production Defects</h1>
    <a href="{{ route('production-defects.create') }}" class="btn btn-primary mb-3">Add New Defect</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Production</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Reported By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($defects as $defect)
                <tr>
                    <td>{{ $defect->id }}</td>
                    <td>{{ $defect->production->name ?? 'N/A' }}</td>
                    <td>{{ $defect->defect_type }}</td>
                    <td>{{ $defect->defect_qty }}</td>
                    <td>{{ ucfirst($defect->status) }}</td>
                    <td>{{ $defect->reported_by }}</td>
                    <td>
                        <a href="{{ route('production-defects.show', $defect->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('production-defects.edit', $defect->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('production-defects.destroy', $defect->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
