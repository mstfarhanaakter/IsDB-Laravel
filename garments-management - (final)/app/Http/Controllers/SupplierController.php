<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Supplier::create($request->all());
        return back()->with('success', 'Supplier added!');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        return back()->with('success', 'Supplier updated!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('success', 'Supplier deleted!');
    }
}

