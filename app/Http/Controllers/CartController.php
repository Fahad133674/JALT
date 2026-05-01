<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Auth;

class CartController extends Controller
{
    // to show cart page
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart', ['cartItems' => $cartItems]);
    }

    // add product in cart
    public function store(Request $request)
    {
        if(!$request->has('size') || !$request->has('color')){
            return back()->with('error', 'Please select at least one size and color!');
        }

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'size' => implode(', ', (array)$request->size), 
            'color' => implode(', ', (array)$request->color), 
            'quantity' => 1
        ]);

        return redirect('/cart');
    }

    // item remove from cart using this method
    public function destroy($id)
    {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        return back()->with('info', 'Item removed.');
    }

    
    public function checkout(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        
        if($cartItems->isEmpty()){
            return back()->with('error', 'Your cart is empty!');
        }

        $details = "";
        $total = 60; // delivery charge

        foreach($cartItems as $item){
            $product = Product::find($item->product_id);
            if($product) {
                $details .= "Product: {$product->name} (Size: {$item->size}, Color: {$item->color}) | ";
                $total += $product->price;
            }
        }

        
        Order::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'phone' => Auth::user()->phone ?? '01XXXXXXXXX', 
            'address' => Auth::user()->address ?? 'Dhaka, Bangladesh',
            'product_details' => $details,
            'total_price' => $total, 
            'status' => 'pending'
        ]);

        Cart::where('user_id', Auth::id())->delete();

        return redirect('/')->with('success', 'Trial Order Placed Successfully!');
    }

    
    public function confirmOrder($id)
    {
        $order = Order::find($id);
        if($order){
            $order->status = 'confirmed'; 
            $order->save();
            return back()->with('success', 'Order has been confirmed!');
        }
        return back()->with('error', 'Order not found!');
    }

    public function addToCart(Request $request) {
        if (auth()->user() && auth()->user()->is_admin == 1) {
            return redirect()->back()->with('error', 'Admins are not allowed to place trial orders.');
        }
    }
}