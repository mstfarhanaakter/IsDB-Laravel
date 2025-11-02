<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
        $buyers = Buyer::all();
        return view('buyers.index', compact('buyers'));
    }

    public function create()
    {
        return view('buyers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'organization_name'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:buyers,email',
        ]);

        Buyer::create($request->all());
        return redirect()->route('buyers.index')->with('success','Buyer Created Successfully');
    }

    public function show($id)
    {
        $buyer = Buyer::findOrFail($id);
        return view('buyers.show', compact('buyer'));
    }

    public function edit($id)
    {
        $buyer = Buyer::findOrFail($id);
        return view('buyers.edit', compact('buyer'));
    }

    public function update(Request $request, $id)
    {
        $buyer = Buyer::findOrFail($id);

        $request->validate([
            'organization_name'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:buyers,email,'.$buyer->id,
        ]);

        $buyer->update($request->all());
        return redirect()->route('buyers.index')->with('success','Buyer Updated Successfully');
    }

    public function destroy($id)
    {
        $buyer = Buyer::findOrFail($id);
        $buyer->delete();
        return redirect()->route('buyers.index')->with('success','Buyer Deleted Successfully');
    }
}
