<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PurchaseItemController extends Controller
{
    public function index()
    {
        $items = PurchaseItem::with('purchaseOrder')->get();
        return view('purchase_items.index', compact('items'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $materials = Material::all();
        return view('purchase_items.create', compact('suppliers', 'materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:0.01',
            'unit_price' => 'required|numeric|min:0'
        ]);

        $purchaseOrder = PurchaseOrder::firstOrCreate(
            [
                'supplier_id' => $request->supplier_id,
                'status' => 'pending'
            ],
            [
                'order_date' => now(),
                'total_amount' => 0
            ]
        );

        $item = PurchaseItem::create([
            'material_id' => $request->material_id,
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'purchase_order_id' => $purchaseOrder->id,
            'status' => 'pending'
        ]);

        $purchaseOrder->total_amount += ($item->quantity * $item->unit_price);
        $purchaseOrder->save();

        return redirect()->route('purchase_items.index')->with('success', 'Purchase Item added to Pending Purchase Order successfully.');
    }

    public function edit(PurchaseItem $purchaseItem)
    {
        $suppliers = Supplier::all();
        $materials = Material::all();
        return view('purchase_items.edit', compact('purchaseItem', 'suppliers', 'materials'));
    }

    public function update(Request $request, PurchaseItem $purchaseItem)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:0.01',
            'unit_price' => 'required|numeric|min:0'
        ]);

        $purchaseItem->update($request->only(['material_id', 'supplier_id', 'quantity', 'unit_price']));

        $purchaseOrder = $purchaseItem->purchaseOrder;
        $total = $purchaseOrder->items()->sum(\DB::raw('quantity * unit_price'));
        $purchaseOrder->update(['total_amount' => $total]);

        return redirect()->route('purchase_items.index')->with('success', 'Purchase Item updated successfully.');
    }

    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->delete();
        return redirect()->route('purchase_items.index')->with('success', 'Purchase Item deleted successfully.');
    }

    public function updateOrderStatus(Request $request, $orderId)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($orderId);
        $status = $request->status;

        $purchaseOrder->status = $status;
        $purchaseOrder->save();

        if ($status === 'approved') {
            $purchaseOrder->items()->update(['status' => 'approved']);
        } elseif ($status === 'cancelled') {
            $purchaseOrder->items()->update(['status' => 'rejected']);
        }

        return redirect()->back()->with('success', 'Purchase Order status updated successfully.');
    }
}
