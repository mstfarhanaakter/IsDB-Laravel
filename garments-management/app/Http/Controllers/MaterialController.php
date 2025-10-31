<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\RawMaterial;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    // Display all materials
    public function index()
    {
        $materials = RawMaterial::with('supplier')->get();
        return view('materials.index', compact('materials'));
    }

    // Show form to create a new material
    public function create()
    {
        $suppliers = Supplier::all();
        return view('materials.create', compact('suppliers'));
    }

    // Store new material
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'opening_stock' => 'required|numeric',
            'current_stock' => 'required|numeric',
            'reorder_level' => 'required|numeric',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ]);

        RawMaterial::create($request->all());

        return redirect()->route('materials.index')->with('success', 'Material created successfully.');
    }

    // Show form to edit existing material
    public function edit(RawMaterial $material)
    {
        $suppliers = Supplier::all();
        return view('materials.edit', compact('material', 'suppliers'));
    }

    // Update existing material
    public function update(Request $request, RawMaterial $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'opening_stock' => 'required|numeric',
            'current_stock' => 'required|numeric',
            'reorder_level' => 'required|numeric',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ]);

        $material->update($request->all());

        return redirect()->route('materials.index')->with('success', 'Material updated successfully.');
    }

    // Delete a material
    public function destroy(RawMaterial $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Material deleted successfully.');
    }
}
