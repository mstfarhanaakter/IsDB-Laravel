@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Deliveries Dashboard</h1>

    <a href="{{ route('deliveries.create') }}" class="btn btn-primary mb-3">Add Delivery</a>

    @if($deliveries->count())
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Order No</th>
                        <th>Delivery Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deliveries as $index => $delivery)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $delivery->order->order_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($delivery->delivery_date)->format('d M, Y') }}</td>
                            <td>
                                @switch($delivery->status)
                                    @case('pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                        @break
                                    @case('on_the_way')
                                        <span class="badge bg-info text-dark">On the Way</span>
                                        @break
                                    @case('delivered')
                                        <span class="badge bg-success">Delivered</span>
                                        @break
                                    @default
                                        <span class="badge bg-light text-dark">Unknown</span>
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('deliveries.show', $delivery->id) }}" class="btn btn-sm btn-secondary">View</a>
                                <a href="{{ route('deliveries.edit', $delivery->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('deliveries.destroy', $delivery->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-muted">No deliveries found.</p>
    @endif
</div>

@endsection
