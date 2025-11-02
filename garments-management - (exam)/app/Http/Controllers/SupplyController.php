<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    // সব Supply দেখানো
    public function index()
    {
        $supplies = Supply::with('supplier')->get();
        return view('supplies.index', compact('supplies'));
    }

    // নতুন Supply form দেখানো
    public function create()
    {
        $suppliers = Supplier::all(); // Supplier dropdown
        return view('supplies.create', compact('suppliers'));
    }

    // Supply সংরক্ষণ করা
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Supply::create($request->all());
        return redirect()->route('supplies.index')->with('success', 'Supply Added Successfully');
    }

    // Edit Form
    public function edit(Supply $supply)
    {
        $suppliers = Supplier::all();
        return view('supplies.edit', compact('supply', 'suppliers'));
    }

    // Update Supply
    public function update(Request $request, Supply $supply)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $supply->update($request->all());
        return redirect()->route('supplies.index')->with('success', 'Supply Updated Successfully');
    }

    //show supply
    public function show(Supply $supply)
{
    return view('supplies.show', compact('supply'));
}

    // Delete Supply
    public function destroy(Supply $supply)
    {
        $supply->delete();
        return redirect()->route('supplies.index')->with('success', 'Supply Deleted');
    }
}
