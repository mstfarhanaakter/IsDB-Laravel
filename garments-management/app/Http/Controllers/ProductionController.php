<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\ProductionLine;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    // Display all productions
    public function index()
    {
        $productions = Production::with('line')->paginate(10);
        return view('production.index', compact('productions'));
    }

    // Show create form
    public function create()
    {
        $lines = ProductionLine::all();
        return view('production.create', compact('lines'));
    }

    // Store a new production
    public function store(Request $request)
    {
        $request->validate([
            'order_no' => 'required|string|max:255',
            'production_date' => 'required|date',
            'produced_qty' => 'nullable|integer|min:0',
            'defect_qty' => 'nullable|integer|min:0',
            'remarks' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
            'line_id' => 'required|exists:production_lines,id',
        ]);

        Production::create([
            'order_no' => $request->order_no,
            'production_date' => $request->production_date,
            'produced_qty' => $request->produced_qty ?? 0,
            'defect_qty' => $request->defect_qty ?? 0,
            'remarks' => $request->remarks,
            'is_completed' => $request->has('is_completed'),
            'line_id' => $request->line_id,
        ]);

        return redirect()->route('productions.index')->with('success', 'Production created successfully.');
    }

    // Show edit form
    public function edit(Production $production)
    {
        $lines = ProductionLine::all();
        return view('production.edit', compact('production', 'lines'));
    }

    // Update an existing production
    public function update(Request $request, Production $production)
    {
        $request->validate([
            'order_no' => 'required|string|max:255',
            'production_date' => 'required|date',
            'produced_qty' => 'nullable|integer|min:0',
            'defect_qty' => 'nullable|integer|min:0',
            'remarks' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
            'line_id' => 'required|exists:production_lines,id',
        ]);

        $production->update([
            'order_no' => $request->order_no,
            'production_date' => $request->production_date,
            'produced_qty' => $request->produced_qty ?? 0,
            'defect_qty' => $request->defect_qty ?? 0,
            'remarks' => $request->remarks,
            'is_completed' => $request->has('is_completed'),
            'line_id' => $request->line_id,
        ]);

        return redirect()->route('productions.index')->with('success', 'Production updated successfully.');
    }

    // Delete a production
    public function destroy(Production $production)
    {
        $production->delete();
        return redirect()->route('productions.index')->with('success', 'Production deleted successfully.');
    }
}
