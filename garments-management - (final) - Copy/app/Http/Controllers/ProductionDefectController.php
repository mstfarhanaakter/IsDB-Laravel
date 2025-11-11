<?php

namespace App\Http\Controllers;

use App\Models\ProductionDefect;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductionDefectController extends Controller
{
    // Show all production defects
    public function index()
    {
        $defects = ProductionDefect::with('production')->get();
        return view('production_defects.index', compact('defects'));
    }

    // Show form to create a new defect
    public function create()
    {
        $productions = Production::all();
        return view('production_defects.create', compact('productions'));
    }

    // Store a new defect
    public function store(Request $request)
    {
        $validated = $request->validate([
            'production_id' => 'required|exists:productions,id',
            'defect_type' => 'required|string|max:255',
            'defect_qty' => 'required|integer|min:0',
            'reported_by' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:pending,reworked,scrapped',
        ]);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = $file->store('defects', 'public');
            $validated['image_path'] = $path;
        }

        ProductionDefect::create($validated);

        return redirect()->route('production-defects.index')
                         ->with('success', 'Production defect created successfully.');
    }

    // Show a single defect
    public function show(ProductionDefect $productionDefect)
    {
        return view('production_defects.show', compact('productionDefect'));
    }

    // Show form to edit a defect
    public function edit(ProductionDefect $productionDefect)
    {
        $productions = Production::all();
        return view('production_defects.edit', compact('productionDefect', 'productions'));
    }

    // Update a defect
    public function update(Request $request, ProductionDefect $productionDefect)
    {
        $validated = $request->validate([
            'production_id' => 'required|exists:productions,id',
            'defect_type' => 'required|string|max:255',
            'defect_qty' => 'required|integer|min:0',
            'reported_by' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:pending,reworked,scrapped',
        ]);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = $file->store('defects', 'public');
            $validated['image_path'] = $path;
        }

        $productionDefect->update($validated);

        return redirect()->route('production-defects.index')
                         ->with('success', 'Production defect updated successfully.');
    }

    // Delete a defect
    public function destroy(ProductionDefect $productionDefect)
    {
        $productionDefect->delete();
        return redirect()->route('production-defects.index')
                         ->with('success', 'Production defect deleted successfully.');
    }
}
