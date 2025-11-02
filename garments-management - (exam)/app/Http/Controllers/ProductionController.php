<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\ProductionLine;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::with('line')->paginate(10);
        return view('production.index', compact('productions'));
    }

    public function create()
    {
        $lines = ProductionLine::all();
        return view('production.create', compact('lines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_no' => 'required|string|max:255',
            'production_date' => 'required|date',
            'planned_qty' => 'required|integer|min:0',
            'produced_qty' => 'required|integer|min:0',
            'defect_qty' => 'required|integer|min:0',
            'is_completed' => 'nullable|boolean',
            'line_id' => 'required|exists:production_lines,id',
            'remarks' => 'nullable|string',
        ]);

        Production::create([
            'order_no' => $request->order_no,
            'production_date' => $request->production_date,
            'planned_qty' => $request->planned_qty,
            'produced_qty' => $request->produced_qty,
            'defect_qty' => $request->defect_qty,
            'remarks' => $request->remarks,
            'is_completed' => $request->has('is_completed'),
            'line_id' => $request->line_id,
        ]);

        return redirect()->route('productions.index')->with('success', 'Production created successfully.');
    }

    public function edit(Production $production)
    {
        $lines = ProductionLine::all();
        return view('production.edit', compact('production', 'lines'));
    }

    public function update(Request $request, Production $production)
    {
        $request->validate([
            'order_no' => 'required|string|max:255',
            'production_date' => 'required|date',
            'planned_qty' => 'required|integer|min:0',
            'produced_qty' => 'required|integer|min:0',
            'defect_qty' => 'required|integer|min:0',
            'is_completed' => 'nullable|boolean',
            'line_id' => 'required|exists:production_lines,id',
            'remarks' => 'nullable|string',
        ]);

        $production->update([
            'order_no' => $request->order_no,
            'production_date' => $request->production_date,
            'planned_qty' => $request->planned_qty,
            'produced_qty' => $request->produced_qty,
            'defect_qty' => $request->defect_qty,
            'remarks' => $request->remarks,
            'is_completed' => $request->has('is_completed'),
            'line_id' => $request->line_id,
        ]);

        return redirect()->route('productions.index')->with('success', 'Production updated successfully.');
    }

    public function destroy(Production $production)
    {
        $production->delete();
        return redirect()->route('productions.index')->with('success', 'Production deleted successfully.');
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

        return view('production.work_progress', compact('progressData'));
    }
}
