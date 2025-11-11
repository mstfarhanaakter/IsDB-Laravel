@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productions</h1>
    <a href="{{ route('productions.create') }}" class="btn btn-primary mb-3">Add Production</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Production Line</th>
                <th>Production Date</th>
                <th>Planned Qty</th>
                <th>Produced Qty</th>
                <th>Defect Qty</th>
                <th>Progress</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productions as $production)
            <tr>
                <td>{{ $production->id }}</td>
                <td>{{ $production->order->order_number }}</td> <!-- Here -->
                <td>{{ $production->line->name }}</td>
                <td>{{ $production->production_date }}</td>
                <td>{{ $production->planned_qty }}</td>
                <td>{{ $production->produced_qty }}</td>
                <td>{{ $production->defect_qty }}</td>
                <td>{{ $production->is_completed ? 'Completed' : 'Pending' }}</td>
                <td>
                    <a href="{{ route('productions.show', $production->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('productions.destroy', $production->id) }}" method="POST" style="display:inline-block">
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
