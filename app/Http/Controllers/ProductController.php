<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('shop.products', compact('products'));
    }

    // Show a single product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.product-details', compact('product'));
    }

    // Show create form
    public function create()
    {
        return view('shop.create-product');
    }

    // Store new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'on_sale' => 'sometimes|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $validated['on_sale'] = $request->has('on_sale') ? (bool)$request->on_sale : false;

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'تم إنشاء المنتج بنجاح.');
    }

    // Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.edit-product', compact('product'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'on_sale' => 'sometimes|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $validated['on_sale'] = $request->has('on_sale') ? (bool)$request->on_sale : false;

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'تم تعديل المنتج بنجاح.');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // optional: delete image file from storage -- left as exercise
        $product->delete();
        return redirect()->route('products.index')->with('success', 'تم حذف المنتج.');
    }
}
