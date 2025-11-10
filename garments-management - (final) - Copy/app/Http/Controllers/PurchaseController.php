<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of purchases.
     */
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'material'])->latest()->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new purchase.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $materials = Material::all();
        return view('purchases.create', compact('suppliers', 'materials'));
    }

    /**
     * Store a newly created purchase in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'material_id' => 'required|exists:materials,id',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
        ]);

        Purchase::create([
            'supplier_id' => $request->supplier_id,
            'material_id' => $request->material_id,
            'purchase_date' => $request->purchase_date,
            'total_amount' => $request->total_amount,
        ]);

        return redirect()->route('purchases.index')
                         ->with('success', 'Purchase added successfully.');
    }

    /**
     * Display the specified purchase.
     */
    public function show(Purchase $purchase)
    {
        $purchase->load(['supplier', 'material']);
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified purchase.
     */
    public function edit(Purchase $purchase)
    {
        $suppliers = Supplier::all();
        $materials = Material::all();
        return view('purchases.edit', compact('purchase', 'suppliers', 'materials'));
    }

    /**
     * Update the specified purchase in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'material_id' => 'required|exists:materials,id',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $purchase->update([
            'supplier_id' => $request->supplier_id,
            'material_id' => $request->material_id,
            'purchase_date' => $request->purchase_date,
            'total_amount' => $request->total_amount,
        ]);

        return redirect()->route('purchases.index')
                         ->with('success', 'Purchase updated successfully.');
    }

    /**
     * Remove the specified purchase from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')
                         ->with('success', 'Purchase deleted successfully.');
    }
}
