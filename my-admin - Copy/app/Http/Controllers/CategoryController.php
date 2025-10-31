<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
     public function index()
     {
           $cats = Category::all();
            // dd($cats->toArray());
            return view('categories.index',compact('cats'));// compact() is used when you want to pass multiple variables to a view.
    }


       public function create()
    {
         
    }

    public function store(Request $request)
    {

        Category::create($request->only([
            'name',
            'details',
        ]));
        // dd($request->all());


        return Redirect::to('/');
    }

    public function update($catagory_id)
    {
        $cat = Category::find($catagory_id);
        return view('categories.edit',compact('cat'));
    }


    public function editStore(Request $request)
    {
       $cat = Category::find($request->catagory_id);
        $cat->name = $request->name;
        $cat->details = $request->details;
        $cat->save();
        return Redirect::to('/');
    }
    public function destroy(Request $request)
    {
        $cat = Category::find($request->catagory_id);
        $cat->delete();
        return Redirect::to('/');
    }
}
