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
        $productions = Production::with(['order', 'line'])->get();
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
        $production->load(['order', 'line']);
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

    // Work Progress: Line-wise & Order-wise
    public function workProgress()
    {
        $lines = ProductionLine::with('productions.order')->get();
        $progressData = [];

        foreach ($lines as $line) {
            $lineData = [
                'line_name' => $line->name,
                'orders' => []
            ];

            foreach ($line->productions as $production) {
                $planned = $production->planned_qty;
                $produced = $production->produced_qty;
                $defect = $production->defect_qty;
                $progress = $planned > 0 ? (($produced - $defect) / $planned) * 100 : 0;

                $lineData['orders'][] = [
                    'order_no' => $production->order->order_number, // ensure order table has 'order_no'
                    'planned' => $planned,
                    'produced' => $produced,
                    'defect' => $defect,
                    'progress' => round($progress, 2),
                ];
            }

            $progressData[] = $lineData;
        }

        return view('productions.work_progress', compact('progressData'));
    }
}
