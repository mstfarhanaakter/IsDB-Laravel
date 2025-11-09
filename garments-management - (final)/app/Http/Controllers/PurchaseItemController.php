<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItem;
use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the purchase items.
     */
    public function index()
    {
        $purchaseItems = PurchaseItem::with(['material', 'supplier'])->get();
        return view('purchase_items.index', compact('purchaseItems'));
    }

    /**
     * Show the form for creating a new purchase item.
     */
    public function create()
    {
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('purchase_items.create', compact('materials', 'suppliers'));
    }

    /**
     * Store a newly created purchase item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:0',
            'unit_price' => 'required|numeric|min:0',
        ]);

        PurchaseItem::create($validated);

        return redirect()->route('purchase-items.index')
                         ->with('success', 'Purchase item created successfully.');
    }

    /**
     * Display the specified purchase item.
     */
    public function show(PurchaseItem $purchaseItem)
    {
        $purchaseItem->load(['material', 'supplier']);
        return view('purchase_items.show', compact('purchaseItem'));
    }

    /**
     * Show the form for editing the specified purchase item.
     */
    public function edit(PurchaseItem $purchaseItem)
    {
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('purchase_items.edit', compact('purchaseItem', 'materials', 'suppliers'));
    }

    /**
     * Update the specified purchase item in storage.
     */
    public function update(Request $request, PurchaseItem $purchaseItem)
    {
        $validated = $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:0',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $purchaseItem->update($validated);

        return redirect()->route('purchase-items.index')
                         ->with('success', 'Purchase item updated successfully.');
    }

    /**
     * Remove the specified purchase item from storage.
     */
    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->delete();

        return redirect()->route('purchase-items.index')
                         ->with('success', 'Purchase item deleted successfully.');
    }
}
