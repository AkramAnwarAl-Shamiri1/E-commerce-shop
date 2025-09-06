<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('shop.products', compact('products'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.product-details', compact('product'));
    }

   
    public function create()
    {
        $categories = Category::all(); 
        return view('shop.create-product', compact('categories'));
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
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

      
        $validated['on_sale'] = $request->has('on_sale') ? true : false;

    
        $validated['slug'] = Str::slug($validated['name'], '-');

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'تم إنشاء المنتج بنجاح.');
    }

   
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('shop.edit-product', compact('product', 'categories'));
    }

   
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
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

        $validated['on_sale'] = $request->has('on_sale') ? true : false;

    
        $validated['slug'] = Str::slug($validated['name'], '-');

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'تم تعديل المنتج بنجاح.');
    }

  
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

      
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'تم حذف المنتج.');
    }
}
