<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Order;
use App\Models\ProductionLine;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductionController extends Controller
{
    // List all productions
    public function index()
    {
        $productions = Production::with(['order', 'line', 'defects'])->get();
        return view('productions.index', compact('productions'));
    }

    // Show form to create new production
    public function create()
    {
        $orders = Order::all();
        $lines = ProductionLine::all();
        return view('productions.create', compact('orders', 'lines'));
    }

    // Store new production
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'line_id' => 'required|exists:production_lines,id',
            'production_date' => 'required|date',
            'planned_qty' => 'required|integer|min:0',
            'produced_qty' => 'nullable|integer|min:0',
            'defect_qty' => 'nullable|integer|min:0',
            'remarks' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
        ]);

        Production::create($validated);

        return redirect()->route('productions.index')
                         ->with('success', 'Production record created successfully.');
    }

    // Show single production
    public function show(Production $production)
    {
        $production->load(['order', 'line', 'defects']);
        return view('productions.show', compact('production'));
    }

    // Show form to edit production
    public function edit(Production $production)
    {
        $orders = Order::all();
        $lines = ProductionLine::all();
        return view('productions.edit', compact('production', 'orders', 'lines'));
    }

    // Update production
    public function update(Request $request, Production $production)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'line_id' => 'required|exists:production_lines,id',
            'production_date' => 'required|date',
            'planned_qty' => 'required|integer|min:0',
            'produced_qty' => 'nullable|integer|min:0',
            'defect_qty' => 'nullable|integer|min:0',
            'remarks' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
        ]);

        $production->update($validated);

        return redirect()->route('productions.index')
                         ->with('success', 'Production record updated successfully.');
    }

    // Delete production
    public function destroy(Production $production)
    {
        $production->delete();
        return redirect()->route('productions.index')
                         ->with('success', 'Production record deleted successfully.');
    }

    public function workProgress()
    {
        $lines = ProductionLine::with('productions')->get();
        $progressData = [];

        foreach ($lines as $line) {
            $totalPlanned = $line->productions->sum('planned_qty') ?? 0;
            $totalProduced = $line->productions->sum('produced_qty') ?? 0;
            $totalDefect = $line->productions->sum('defect_qty') ?? 0;

            $progress = $totalPlanned > 0 ? (($totalProduced - $totalDefect) / $totalPlanned) * 100 : 0;

            $progressData[] = [
                'line_name' => $line->name,
                'planned' => $totalPlanned,
                'produced' => $totalProduced,
                'defect' => $totalDefect,
                'progress' => round($progress, 2),
            ];
        }

        return view('productions.work_progress', compact('progressData'));
    }
}
