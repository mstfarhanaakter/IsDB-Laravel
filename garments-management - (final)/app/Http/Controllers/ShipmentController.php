<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with('order')->paginate(10);
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        $orders = Order::where('status', 'completed')->get();
        return view('shipments.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'shipment_date' => 'required|date'
        ]);

        Shipment::create($request->all());
        return redirect()->route('shipments.index')->with('success', 'Shipment added!');
    }
}

