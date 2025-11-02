<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    // সব Purchase Orders দেখানো
    public function index()
    {
        $orders = PurchaseOrder::with(['supplier', 'supply'])->get();
        return view('purchase_orders.index', compact('orders'));
    }

    // Create form দেখানো
    public function create()
    {
        $suppliers = Supplier::all();
        $supplies = Supply::all();
        return view('purchase_orders.create', compact('suppliers', 'supplies'));
    }

    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'supply_id' => 'required|exists:supplies,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'order_date' => 'nullable|date',
        ]);

        PurchaseOrder::create($request->all());
        return redirect()->route('purchase_orders.index')->with('success', 'Purchase Order Added Successfully');
    }

    // Edit form
    // Controller
public function edit(PurchaseOrder $purchase_order)
{
    $suppliers = Supplier::all();
    $supplies = Supply::all();
    return view('purchase_orders.edit', compact('purchase_order', 'suppliers', 'supplies'));
}


    // Update data
    public function update(Request $request, PurchaseOrder $purchase_order)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'supply_id' => 'required|exists:supplies,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'order_date' => 'nullable|date',
        ]);

        $purchase_order->update($request->all());
        return redirect()->route('purchase_orders.index')->with('success', 'Purchase Order Updated Successfully');
    }
    // Show details
    public function show(PurchaseOrder $purchase_order){
    return view('purchase_orders.show', compact('purchase_order'));
}


    // Delete
    public function destroy(PurchaseOrder $purchase_order)
    {
        $purchase_order->delete();
        return redirect()->route('purchase_orders.index')->with('success', 'Purchase Order Deleted');
    }
}
