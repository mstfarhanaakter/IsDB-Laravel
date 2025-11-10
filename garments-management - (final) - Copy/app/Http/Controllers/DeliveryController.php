<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DeliveryController extends Controller
{
    // Show all deliveries
    public function index()
    {
        $deliveries = Delivery::with('order')->get();
        return view('deliveries.index', compact('deliveries'));
    }

    // Show form to create a delivery
    public function create()
    {
        $orders = Order::all(); // or filter pending orders
        return view('deliveries.create', compact('orders'));
    }

    // Store delivery
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'delivery_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Delivery::create($request->all());

        return redirect()->route('deliveries.index')->with('success', 'Delivery created successfully.');
    }

    // Show form to edit delivery
    public function edit(Delivery $delivery)
    {
        $orders = Order::all();
        return view('deliveries.edit', compact('delivery', 'orders'));
    }

    // Show a single delivery
public function show(Delivery $delivery)
{
    return view('deliveries.show', compact('delivery'));
}


    // Update delivery
    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'delivery_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $delivery->update($request->all());

        return redirect()->route('deliveries.index')->with('success', 'Delivery updated successfully.');
    }

    // Delete delivery
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('deliveries.index')->with('success', 'Delivery deleted successfully.');
    }
}
