<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
     public function index()
     {
           $cats = Categories::all();
            // dd($cats->toArray());
            return view('categories.index',compact('cats'));// compact() is used when you want to pass multiple variables to a view.
    }


       public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

        Categories::create($request->only([
            'name',
            'details',
        ]));
        // dd($request->all());


        return Redirect::to('/');
    }

    public function update($catagory_id)
    {
        $cat = Categories::find($catagory_id);
        return view('categories.edit',compact('cat'));
    }


    public function editStore(Request $request)
    {
       $cat = Categories::find($request->catagory_id);
        $cat->name = $request->name;
        $cat->details = $request->details;
        $cat->save();
        return Redirect::to('/');
    }
    public function destroy(Request $request)
    {
        $cat = Categories::find($request->catagory_id);
        $cat->delete();
        return Redirect::to('/');
    }
}
