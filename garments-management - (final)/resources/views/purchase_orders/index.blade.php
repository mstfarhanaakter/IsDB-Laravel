@extends('layouts.app')

@section('content')
    <h1>Purchase Orders</h1>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Supplier</th>
                <th>Items</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->supplier->name }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{ $item->material->name }} - {{ $item->quantity }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
