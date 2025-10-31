@extends('layout.app')

@section('content')
<div class="container">
    <h1>Purchases</h1>
    <a href="{{ route('purchases.create') }}" class="btn btn-primary mb-3">Add Purchase</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Material</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Purchase Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
            <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->material->name }}</td>
                <td>{{ $purchase->supplier->name }}</td>
                <td>{{ $purchase->quantity }}</td>
                <td>{{ $purchase->price }}</td>
                <td>{{ $purchase->purchase_date }}</td>
                <td>
                    <a href="{{ route('purchases.edit', $purchase) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('purchases.destroy', $purchase) }}" method="POST" style="display:inline-block;">
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
