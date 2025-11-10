<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Order;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::with(['order', 'department'])->get();
        return view('productions.index', compact('productions'));
    }

    public function create()
    {
        $orders = Order::all();
        $departments = Department::all();
        return view('productions.create', compact('orders', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'department_id' => 'required|exists:departments,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'completed_qty' => 'nullable|integer|min:0',
            'status' => 'required|in:not_started,ongoing,completed',
        ]);

        Production::create($request->all());

        return redirect()->route('productions.index')->with('success', 'Production created successfully.');
    }

    public function show(Production $production)
    {
        return view('productions.show', compact('production'));
    }

    public function edit(Production $production)
    {
        $orders = Order::all();
        $departments = Department::all();
        return view('productions.edit', compact('production', 'orders', 'departments'));
    }

    public function update(Request $request, Production $production)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'department_id' => 'required|exists:departments,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'completed_qty' => 'nullable|integer|min:0',
            'status' => 'required|in:not_started,ongoing,completed',
        ]);

        $production->update($request->all());

        return redirect()->route('productions.index')->with('success', 'Production updated successfully.');
    }

    public function destroy(Production $production)
    {
        $production->delete();
        return redirect()->route('productions.index')->with('success', 'Production deleted successfully.');
    }
}

