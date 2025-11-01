<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductionDefect;
use App\Models\Production;

class ProductionDefectController extends Controller
{
    // Display all defects
    public function index()
    {
        $defects = ProductionDefect::with('production')->get();
        return view('defects.index', compact('defects'));
    }

    // Show form to create a new defect
    public function create()
    {
        $productions = Production::all();
        return view('defects.create', compact('productions'));
    }

    // Store a new defect
    public function store(Request $request)
    {
        $request->validate([
            'production_id' => 'required|exists:productions,id',
            'defect_type' => 'required|string|max:255',
            'defect_qty' => 'required|integer|min:1',
        ]);

        ProductionDefect::create($request->all());

        // Update defect_qty in production
        $production = Production::find($request->production_id);
        $production->increment('defect_qty', $request->defect_qty);

        return redirect()->route('defects.index')->with('success', 'Defect added successfully!');
    }

    // Show form to edit a defect
    public function edit(ProductionDefect $defect)
    {
        $productions = Production::all();
        return view('defects.edit', compact('defect', 'productions'));
    }

    // Update defect
    public function update(Request $request, ProductionDefect $defect)
    {
        $request->validate([
            'production_id' => 'required|exists:productions,id',
            'defect_type' => 'required|string|max:255',
            'defect_qty' => 'required|integer|min:1',
            'status' => 'required|in:pending,reworked,scrapped'
        ]);

        // Adjust old defect qty in production
        $oldQty = $defect->defect_qty;
        $defect->update($request->all());
        $production = Production::find($request->production_id);
        $production->defect_qty = $production->defect_qty - $oldQty + $request->defect_qty;
        $production->save();

        return redirect()->route('defects.index')->with('success', 'Defect updated successfully!');
    }

    // Delete a defect
    public function destroy(ProductionDefect $defect)
    {
        $production = Production::find($defect->production_id);
        $production->decrement('defect_qty', $defect->defect_qty);

        $defect->delete();

        return redirect()->route('defects.index')->with('success', 'Defect deleted successfully!');
    }
}
