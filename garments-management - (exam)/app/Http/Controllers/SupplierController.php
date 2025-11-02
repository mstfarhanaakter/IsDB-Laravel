<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Display all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // Show create form
    public function create()
    {
        return view('suppliers.create');
    }

    // Store new supplier
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:suppliers,email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Supplier Added Successfully');
    }

    // Show edit form
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    // Update supplier
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Supplier Updated Successfully');
    }

    // supplier details
    public function show(Supplier $supplier){
        return view('suppliers.show', compact('supplier'));
    }

    // Delete supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier Deleted');
    }
}
