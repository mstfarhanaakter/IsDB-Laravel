<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders = Order::with('buyer')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        $buyers = Buyer::all();
        return view('orders.create', compact('buyers'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'buyer_id' => 'required|exists:buyers,id',
            'order_number' => 'required|string|unique:orders',
            'order_date' => 'required|date',
            'delivery_date' => 'nullable|date|after_or_equal:order_date',
            'total_qty' => 'nullable|integer|min:0',
            'status' => 'required|in:pending,in_production,completed,delivered',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        $order->load('buyer');
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        $buyers = Buyer::all();
        return view('orders.edit', compact('order', 'buyers'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'buyer_id' => 'required|exists:buyers,id',
            'order_number' => 'required|string|unique:orders,order_number,' . $order->id,
            'order_date' => 'required|date',
            'delivery_date' => 'nullable|date|after_or_equal:order_date',
            'total_qty' => 'nullable|integer|min:0',
            'status' => 'required|in:pending,in_production,completed,delivered',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
