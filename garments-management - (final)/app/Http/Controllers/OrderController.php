<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('buyer')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $buyers = Buyer::all();
        return view('orders.create', compact('buyers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buyer_id' => 'required|exists:buyers,id',
            'order_no' => 'required|unique:orders,order_no',
            'order_date' => 'required|date',
            'delivery_date' => 'nullable|date|after_or_equal:order_date',
            'total_qty' => 'required|integer|min:0',
            'status' => 'required|in:pending,in_production,completed,delivered',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $buyers = Buyer::all();
        return view('orders.edit', compact('order', 'buyers'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'buyer_id' => 'required|exists:buyers,id',
            'order_no' => 'required|unique:orders,order_no,' . $order->id,
            'order_date' => 'required|date',
            'delivery_date' => 'nullable|date|after_or_equal:order_date',
            'total_qty' => 'required|integer|min:0',
            'status' => 'required|in:pending,in_production,completed,delivered',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted!');
    }
}
