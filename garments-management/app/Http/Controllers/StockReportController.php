<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    public function index()
    {
        $transactions = StockTransaction::with('material')->latest()->get();
        return view('stocktransactions.index', compact('transactions'));
    }

    public function create()
    {
        $materials = RawMaterial::all();
        return view('stocktransactions.create', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:rawmaterials,id',
            'type' => 'required|in:IN,OUT',
            'quantity' => 'required|numeric|min:0.01',
            'transaction_date' => 'required|date',
            'reference' => 'nullable|string|max:255',
        ]);

        StockTransaction::create($request->all());

        return redirect()->route('stocktransactions.index')->with('success', 'Transaction added successfully!');
    }

    public function edit(StockTransaction $stocktransaction)
    {
        $materials = RawMaterial::all();
        return view('stocktransactions.edit', compact('stocktransaction', 'materials'));
    }

    public function update(Request $request, StockTransaction $stocktransaction)
    {
        $request->validate([
            'material_id' => 'required|exists:rawmaterials,id',
            'type' => 'required|in:IN,OUT',
            'quantity' => 'required|numeric|min:0.01',
            'transaction_date' => 'required|date',
            'reference' => 'nullable|string|max:255',
        ]);

        $stocktransaction->update($request->all());

        return redirect()->route('stocktransactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function destroy(StockTransaction $stocktransaction)
    {
        $stocktransaction->delete();
        return redirect()->route('stocktransactions.index')->with('success', 'Transaction deleted successfully!');
    }
}
