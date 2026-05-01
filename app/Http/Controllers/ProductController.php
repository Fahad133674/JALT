<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    
    
    public function index(Request $request) {
        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $products = $query->get();
        
        return view('home', ['products' => $products]);
    }

    
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('product_detail', ['product' => $product]);
    }

    
    public function adminIndex() {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        
        
        $product->sizes = $request->sizes; 
        $product->colors = $request->colors; 

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $product->image = $filename;
        }

        $product->save();
        return redirect('/admin/products')->with('success', 'Product added successfully!');
    }

    
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.edit_product', ['product' => $product]);
    }

    
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        
        
        $product->sizes = $request->sizes; 
        $product->colors = $request->colors;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $product->image = $filename;
        }

        $product->save();
        return redirect('/admin/products')->with('success', 'Product updated successfully!');
    }

    
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product deleted!');
    }
}