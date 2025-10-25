<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articals = Artical::with('comments')->get();
        return view('articles.index', compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('articals.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'details' => 'required|string',
    ]);

    Artical::create([
        'name' => $request->name,
        'details'=> $request->details,
    ]);

    return redirect()->route('articles.index')->with('success', 'Article Created Successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(Artical $artical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artical $artical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artical $artical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artical $artical)
    {
        //
    }
}
