<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Order;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductionController extends Controller
{
    /**
     * Display a listing of productions
     */
    public function index()
    {
        // সব production নিয়ে আসা, eager load order & department
        $productions = Production::with(['order', 'department'])->get();
        return view('productions.index', compact('productions'));
    }

    /**
     * Show the form for creating a new production
     */
    public function create()
    {
        $orders = Order::all();
        $departments = Department::all();
        return view('productions.create', compact('orders', 'departments'));
    }

    /**
     * Store a newly created production in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'department_id' => 'required|exists:departments,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'completed_qty' => 'required|integer|min:0',
            'status' => 'required|in:not_started,ongoing,completed',
        ]);

        Production::create($request->all());

        return redirect()->route('productions.index')
                         ->with('success', 'Production created successfully!');
    }

    /**
     * Display the specified production
     */
    public function show(Production $production)
    {
        $production->load(['order', 'department']);
        return view('productions.show', compact('production'));
    }

    /**
     * Show the form for editing the specified production
     */
    public function edit(Production $production)
    {
        $orders = Order::all();
        $departments = Department::all();
        return view('productions.edit', compact('production', 'orders', 'departments'));
    }

    /**
     * Update the specified production in storage
     */
    public function update(Request $request, Production $production)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'department_id' => 'required|exists:departments,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'completed_qty' => 'required|integer|min:0',
            'status' => 'required|in:not_started,ongoing,completed',
        ]);

        $production->update($request->all());

        return redirect()->route('productions.index')
                         ->with('success', 'Production updated successfully!');
    }

    /**
     * Remove the specified production from storage
     */
    public function destroy(Production $production)
    {
        $production->delete();
        return redirect()->route('productions.index')
                         ->with('success', 'Production deleted successfully!');
    }
}
