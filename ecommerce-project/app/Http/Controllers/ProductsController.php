<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    // List all products
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        return view('products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'old_price'   => 'nullable|numeric',
            'new_price'   => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'image' => $imagePath
        ]);

        return Redirect::to('/products')->with('success', 'Product added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Handle edit submission
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'old_price'   => 'nullable|numeric',
            'new_price'   => 'required|numeric',
        ]);

        $product = Products::findOrFail($id);

        // Replace image if uploaded
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'image' => $product->image
        ]);

        return Redirect::to('/products')->with('success', 'Product updated successfully.');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return Redirect::to('/products')->with('success', 'Product deleted successfully.');
    }
}
