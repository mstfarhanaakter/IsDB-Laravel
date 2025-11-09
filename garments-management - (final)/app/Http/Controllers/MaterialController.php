<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MaterialController extends Controller
{
    // Display a list of all materials
    public function index()
    {
        // Eager load supplier to avoid N+1 problem
        $materials = Material::with('supplier')->get();
        return view('materials.index', compact('materials'));
    }

    // Show form to create a new material
    public function create()
    {
        $suppliers = Supplier::all(); // To select supplier in form
        return view('materials.create', compact('suppliers'));
    }

    // Store new material in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric|min:0',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ]);

        Material::create($request->all());

        return redirect()->route('materials.index')->with('success', 'Material created successfully.');
    }

    // Show form to edit a material
    public function edit(Material $material)
    {
        $suppliers = Supplier::all();
        return view('materials.edit', compact('material', 'suppliers'));
    }

    //show a specific material
    public function show(Material $material){
        return view('materials.show', compact('material'));
    }

    // Update material in database
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric|min:0',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ]);

        $material->update($request->all());

        return redirect()->route('materials.index')->with('success', 'Material updated successfully.');
    }

    // Delete a material
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Material deleted successfully.');
    }
}
