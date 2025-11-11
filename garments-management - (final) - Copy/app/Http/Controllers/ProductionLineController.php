<?php

namespace App\Http\Controllers;

use App\Models\ProductionLine;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductionLineController extends Controller
{
    // Display a list of all production lines
    public function index()
    {
        $lines = ProductionLine::all();
        return view('production_lines.index', compact('lines'));
    }

    // Show form to create a new production line
    public function create()
    {
        return view('production_lines.create');
    }

    // Store a new production line
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:production_lines,name',
            'description' => 'nullable|string',
        ]);

        ProductionLine::create($validated);

        return redirect()->route('production-lines.index')
                         ->with('success', 'Production line created successfully.');
    }

    // Show details of a single production line
    public function show(ProductionLine $productionLine)
    {
        return view('production_lines.show', compact('productionLine'));
    }

    // Show form to edit an existing production line
    public function edit(ProductionLine $productionLine)
    {
        return view('production_lines.edit', compact('productionLine'));
    }

    // Update an existing production line
    public function update(Request $request, ProductionLine $productionLine)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:production_lines,name,' . $productionLine->id,
            'description' => 'nullable|string',
        ]);

        $productionLine->update($validated);

        return redirect()->route('production-lines.index')
                         ->with('success', 'Production line updated successfully.');
    }

    // Delete a production line
    public function destroy(ProductionLine $productionLine)
    {
        $productionLine->delete();

        return redirect()->route('production-lines.index')
                         ->with('success', 'Production line deleted successfully.');
    }
}
