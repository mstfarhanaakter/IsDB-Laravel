<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
   public function index()
    {
        $materials = RawMaterial::with('supplier')->get();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('materials.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'opening_stock' => 'required|numeric',
            'current_stock' => 'required|numeric',
            'reorder_level' => 'required|numeric',
            'supplier_id' => 'nullable|exists:suppliers,id'
        ]);

        RawMaterial::create($request->all());
        return redirect()->route('materials.index')->with('success', 'Raw Material added successfully.');
    }

    public function edit(RawMaterial $rawmaterial)
    {
        $suppliers = Supplier::all();
        return view('materials.edit', compact('rawmaterial', 'suppliers'));
    }

    public function update(Request $request, RawMaterial $rawmaterial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'opening_stock' => 'required|numeric',
            'current_stock' => 'required|numeric',
            'reorder_level' => 'required|numeric',
            'supplier_id' => 'nullable|exists:suppliers,id'
        ]);

        $rawmaterial->update($request->all());
        return redirect()->route('materials.index')->with('success', 'Raw Material updated successfully.');
    }

    public function destroy(RawMaterial $rawmaterial)
    {
        $rawmaterial->delete();
        return redirect()->route('materials.index')->with('success', 'Raw Material deleted successfully.');
    }

}
