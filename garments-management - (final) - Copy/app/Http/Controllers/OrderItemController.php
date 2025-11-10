<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderItemController extends Controller
{
    /**
     * Display a listing of order items.
     */
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])->latest()->get();
        return view('order_items.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new order item.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.create', compact('orders', 'products'));
    }

    /**
     * Store a newly created order item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        OrderItem::create($validated);

        return redirect()->route('order_items.index')
            ->with('success', 'Order item created successfully.');
    }

    /**
     * Display the specified order item.
     */
    public function show(OrderItem $orderItem)
    {
        $orderItem->load(['order', 'product']);
        return view('order_items.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified order item.
     */
    public function edit(OrderItem $orderItem)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.edit', compact('orderItem', 'orders', 'products'));
    }

    /**
     * Update the specified order item in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderItem->update($validated);

        return redirect()->route('order_items.index')
            ->with('success', 'Order item updated successfully.');
    }

    /**
     * Remove the specified order item from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->route('order_items.index')
            ->with('success', 'Order item deleted successfully.');
    }
}
