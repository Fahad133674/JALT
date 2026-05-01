<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use File;

class AdminController extends Controller
{
    // show total order, user, product in dashboard   
    public function dashboard() {
        $totalUsers = \App\Models\User::count();
        $totalProducts = \App\Models\Product::count();
        $totalOrders = \App\Models\Order::count(); 

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders
        ]);
    }

    // to see product list
    public function manageProducts()
    {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    // to view new product
    public function createProduct()
    {
        return view('admin.add_product');
    }

    // storing product
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads'), $imageName);

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect('/admin/products')->with('success', 'Product Added Successfully!');
    }

    // deleting product
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if(File::exists(public_path('uploads/'.$product->image))) {
            File::delete(public_path('uploads/'.$product->image));
        }
        $product->delete();
        return back()->with('success', 'Product Deleted!');
    }

    // user management
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'User Deleted!');
    }

    public function orders() {
        return view('admin.orders');
    }

    public function confirmOrder($id)
    {
        $order = \App\Models\Order::find($id);
        if($order){
            $order->status = 'CONFIRMED';
            $order->save();
        }

        return back()->with('success', 'Order Confirmed Successfully!');
    }


    public function editProduct($id) {
        $product = \App\Models\Product::findOrFail($id);
        return view('admin.edit_product', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id) {
        $product = \App\Models\Product::findOrFail($id);

        
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category'); 
        $product->sizes = $request->input('sizes');
        $product->colors = $request->input('colors');
        $product->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->save(); 
        return redirect('/admin/products')->with('success', 'Product updated successfully!');
    }
}