<?php

namespace App\Http\Controllers;

use App\Models\ProductionDefect;
use App\Models\ProductionLine;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductionDefectController extends Controller
{
    /**
     * Display a listing of the defects.
     */
    public function index()
    {
        $defects = ProductionDefect::with(['productionLine', 'order'])->latest()->paginate(15);
        return view('production_defects.index', compact('defects'));
    }

    /**
     * Show the form for creating a new defect.
     */
    public function create()
    {
        $productionLines = ProductionLine::all();
        $orders = Order::all();
        return view('production_defects.create', compact('productionLines', 'orders'));
    }

    /**
     * Store a newly created defect.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productions_line_id' => 'required|exists:production_lines,id',
            'order_id' => 'required|exists:orders,id',
            'defect_type' => 'required|string|max:255',
            'defect_qty' => 'required|integer|min:0',
            'reported_by' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,reworked,scrapped',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('defect_images', 'public');
        }

        ProductionDefect::create($data);

        return redirect()->route('production_defects.index')->with('success', 'Production defect reported successfully.');
    }

    /**
     * Display the specified defect.
     */
    public function show(ProductionDefect $productionDefect)
    {
        return view('production_defects.show', compact('productionDefect'));
    }

    /**
     * Show the form for editing the defect.
     */
    public function edit(ProductionDefect $productionDefect)
    {
        $productionLines = ProductionLine::all();
        $orders = Order::all();
        return view('production_defects.edit', compact('productionDefect', 'productionLines', 'orders'));
    }

    /**
     * Update the defect.
     */
    public function update(Request $request, ProductionDefect $productionDefect)
    {
        $request->validate([
            'productions_line_id' => 'required|exists:production_lines,id',
            'order_id' => 'required|exists:orders,id',
            'defect_type' => 'required|string|max:255',
            'defect_qty' => 'required|integer|min:0',
            'reported_by' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,reworked,scrapped',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('defect_images', 'public');
        }

        $productionDefect->update($data);

        return redirect()->route('production_defects.index')->with('success', 'Production defect updated successfully.');
    }

    /**
     * Remove the defect.
     */
    public function destroy(ProductionDefect $productionDefect)
    {
        $productionDefect->delete();
        return redirect()->route('production_defects.index')->with('success', 'Production defect deleted successfully.');
    }
}
