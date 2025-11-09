<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\PurchaseItem;
use Illuminate\Routing\Controller;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the purchase orders.
     */
    public function index()
    {
        // Eager load supplier and items with material
        $orders = PurchaseOrder::with(['supplier', 'items.material'])->get();
        return view('purchase_orders.index', compact('orders'));
    }

    /**
     * Show the form for editing a purchase item.
     */
    public function editItem($id)
    {
        $item = PurchaseItem::with(['material', 'purchaseOrder'])->findOrFail($id);
        $materials = Material::all();
        $suppliers = Supplier::all();
        return view('purchase_items.edit', compact('item', 'materials', 'suppliers'));
    }

    /**
     * Update a purchase item and sync the order status.
     */
    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $item = PurchaseItem::findOrFail($id);
        $item->update([
            'material_id' => $request->material_id,
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'status' => $request->status,
        ]);

        // Sync order status based on all item statuses
        $order = $item->purchaseOrder;

        if ($order->items()->where('status', 'pending')->exists()) {
            $order->status = 'pending';
        } elseif ($order->items()->where('status', 'rejected')->exists()) {
            $order->status = 'rejected';
        } else {
            $order->status = 'approved';
        }

        $order->save();

        return redirect()->route('purchase_orders.index')
                         ->with('success', 'Purchase Item updated and order status synced successfully.');
    }

    /**
     * Optional: Update the status of an order directly.
     */
    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,cancelled,rejected'
        ]);

        $order = PurchaseOrder::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        // Optionally update items too
        if ($request->status === 'approved') {
            $order->items()->update(['status' => 'approved']);
        }
        if ($request->status === 'rejected' || $request->status === 'cancelled') {
            $order->items()->update(['status' => 'rejected']);
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    /**
     * Other CRUD methods for Purchase Orders if needed
     */
}
