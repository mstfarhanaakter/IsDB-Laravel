<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\RawMaterial;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['material', 'supplier'])->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $materials = RawMaterial::all();
        $suppliers = Supplier::all();
        return view('purchases.create', compact('materials', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:rawmaterials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        Purchase::create($request->all());
        return redirect()->route('purchases.index')->with('success', 'Purchase added successfully.');
    }

    public function edit(Purchase $purchase)
    {
        $materials = RawMaterial::all();
        $suppliers = Supplier::all();
        return view('purchases.edit', compact('purchase', 'materials', 'suppliers'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'material_id' => 'required|exists:rawmaterials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $purchase->update($request->all());
        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully.');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully.');
    }
}
