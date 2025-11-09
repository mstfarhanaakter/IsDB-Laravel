<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BuyerController extends Controller
{
    // Display a list of buyers
    public function index()
    {
        $buyers = Buyer::latest()->paginate(10);
        return view('buyers.index', compact('buyers'));
    }

    // Show form to create a new buyer
    public function create()
    {
        return view('buyers.create');
    }

    // Store a new buyer in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:50',
            'email' => 'required|email|unique:buyers,email',
            'address' => 'nullable|string',
        ]);

        Buyer::create($request->all());

        return redirect()->route('buyers.index')->with('success', 'Buyer created successfully!');
    }

    // Show a single buyer
    public function show(Buyer $buyer)
    {
        return view('buyers.show', compact('buyer'));
    }

    // Show form to edit a buyer
    public function edit(Buyer $buyer)
    {
        return view('buyers.edit', compact('buyer'));
    }

    // Update a buyer
    public function update(Request $request, Buyer $buyer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:50',
            'email' => 'required|email|unique:buyers,email,' . $buyer->id,
            'address' => 'nullable|string',
        ]);

        $buyer->update($request->all());

        return redirect()->route('buyers.index')->with('success', 'Buyer updated successfully!');
    }

    // Delete a buyer
    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
        return redirect()->route('buyers.index')->with('success', 'Buyer deleted!');
    }

    public function showOrders()
{
    $buyers = Buyer::with('orders')->get(); // সব কাস্টমার এবং তাদের অর্ডার লোড করা

    return view('buyers.orders', compact('buyers'));
}
}
