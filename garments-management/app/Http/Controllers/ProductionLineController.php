<?php

namespace App\Http\Controllers;

use App\Models\ProductionLine;
use Illuminate\Http\Request;

class ProductionLineController extends Controller
{
    public function index()
    {
        $lines = ProductionLine::paginate(10);
        return view('production_lines.index', compact('lines'));
    }

    public function create()
    {
        return view('production_lines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:production_lines,name',
            'description' => 'nullable|string',
        ]);

        ProductionLine::create($request->all());

        return redirect()->route('production_lines.index')->with('success', 'Production line created successfully.');
    }

    public function edit(ProductionLine $production_line)
    {
        return view('production_lines.edit', compact('production_line'));
    }

    public function update(Request $request, ProductionLine $production_line)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:production_lines,name,' . $production_line->id,
            'description' => 'nullable|string',
        ]);

        $production_line->update($request->all());

        return redirect()->route('production_lines.index')->with('success', 'Production line updated successfully.');
    }

    public function destroy(ProductionLine $production_line)
    {
        $production_line->delete();
        return redirect()->route('production_lines.index')->with('success', 'Production line deleted successfully.');
    }
}
