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
        $productions = Production::with(['order', 'department'])->paginate(10);
        return view('productions.index', compact('productions'));
    }

    public function create()
    {
        $orders = Order::where('status', 'in_production')->get();
        $departments = Department::all();
        return view('productions.create', compact('orders', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'department_id' => 'required',
            'start_date' => 'required|date'
        ]);

        Production::create($request->all());
        return redirect()->route('productions.index')->with('success', 'Production record created!');
    }

    public function update(Request $request, Production $production)
    {
        $production->update($request->all());
        return redirect()->route('productions.index')->with('success', 'Production updated!');
    }

    public function destroy(Production $production)
    {
        $production->delete();
        return redirect()->route('productions.index')->with('success', 'Production deleted!');
    }
}

