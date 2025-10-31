<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    //production list

    public function index(){
        $productions = Production::latest()->get();
        return view('production.index', compact('productions'));
    }

    //new production entry form 

    public function create(){
        return view('production.create');
    }

    // store production store 

    public function store(Request $request){
        $request->validate([
            'production_date' => 'required|date',
            'line' => 'required|string',
            'order_no' => 'required|string', 
            'produced_qty' => 'required|integer'
        ]);

        Production::create([
            'production_date' => $request-> production_date,
            'line' => $request ->line, 
            'order_no' =>$request->order_no,
            'produced_qty' => $request-> produced_qty,
            'defect_qty' => $request-> defect_qty,
            'remarks' =>$request-> remarks
        ]);

        return redirect()->route('production.index')->with('success', 'production data saved successfully');
    }
}
