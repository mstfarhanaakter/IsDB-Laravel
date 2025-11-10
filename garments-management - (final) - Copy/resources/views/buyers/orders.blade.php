@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Buyers Orders Dashboard</h1>

    @foreach($buyers as $buyer)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span><strong>{{ $buyer->name }}</strong>'s Orders</span>
                <span class="badge bg-dark">{{ $buyer->orders->count() }} Orders</span>
            </div>
            <div class="card-body p-0">
                @if($buyer->orders->count())
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>Delivery Date</th>
                                    <th>Total Quantity</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($buyer->orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M, Y') }}</td>
                                        <td>{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d M, Y') : '-' }}</td>
                                        <td>{{ $order->total_qty }}</td>
                                        <td>
                                            @switch($order->status)
                                                @case('pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                    @break
                                                @case('in_production')
                                                    <span class="badge bg-info text-dark">In Production</span>
                                                    @break
                                                @case('completed')
                                                    <span class="badge bg-success">Completed</span>
                                                    @break
                                                @case('delivered')
                                                    <span class="badge bg-secondary">Delivered</span>
                                                    @break
                                                @default
                                                    <span class="badge bg-light text-dark">Unknown</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary">
                                                Edit Items
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="p-3 mb-0 text-muted text-center">This customer has no orders yet.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>

@endsection
