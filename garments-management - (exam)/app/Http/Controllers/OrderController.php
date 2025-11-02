<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function index()
    {
        $orders = Order::with(['buyer','delivery'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $buyers = Buyer::all(); // Dropdown list
        return view('orders.create', compact('buyers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buyer_id'=>'required',
            'product'=>'required',
            'quantity'=>'required|integer',
            'price'=>'required|numeric',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success','Order Created');
    }

    public function show($id)
    {
        $order = Order::with(['buyer','delivery'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $buyers = Buyer::all();
        return view('orders.edit', compact('order','buyers'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success','Order Updated');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success','Order Deleted');
    }
}


