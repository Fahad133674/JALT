@extends('layouts.app')

@section('content')

<div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;"\>
<h2 style="margin-bottom: 30px; font-weight: bold; color: var(--jalt-dark);"\>
<i class="bi bi-cart3"\></i\> Your Trial Cart <span style="font-size: 0.9rem; font-weight: normal; color: \#888;"\>(Try Before Pay)</span\>
</h2\>


@if(count($cartItems) > 0)
<div style="display: flex; gap: 30px; flex-wrap: wrap;">
    
    <div style="flex: 2; min-width: 300px;">
        <div class="jalt-card" style="padding: 10px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: left; border-bottom: 2px solid #eee;">
                        <th style="padding: 15px; color: #666;">Product</th>
                        <th style="padding: 15px; color: #666;">Base Price</th>
                        <th style="padding: 15px; color: #666;">Trial Selection</th>
                        <th style="padding: 15px; color: #666; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $subtotal = 0; 
                        $delivery_charge = 60; 
                    @endphp

                    @foreach($cartItems as $item)
                    @php 
                        $product = \App\Models\Product::find($item->product_id); 
                    @endphp
                    
                    @if($product)
                        @php 
                            $subtotal += $product->price;
                        @endphp
                        <tr style="border-bottom: 1px solid #f5f5f5;">
                            <td style="padding: 15px; display: flex; align-items: center; gap: 15px;">
                                <img src="{{ asset('uploads/'.$product->image) }}" style="width: 60px; height: 75px; object-fit: cover; border-radius: 8px; border: 1px solid #eee;">
                                <span style="font-weight: 600; color: #333;">{{ $product->name }}</span>
                            </td>
                            <td style="padding: 15px; font-weight: bold; color: #444;">Tk {{ number_format($product->price, 0) }}</td>
                            <td style="padding: 15px;">
                                <div style="margin-bottom: 5px;">
                                    <small style="color: #999; display: block;">Size:</small>
                                    <span style="background: #f0f0f0; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold;">{{ $item->size }}</span>
                                </div>
                                <div>
                                    <small style="color: #999; display: block;">Color:</small>
                                    <span style="background: #f0f0f0; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold;">{{ $item->color }}</span>
                                </div>
                            </td>
                            <td style="padding: 15px; text-align: center;">
                                <a href="{{ url('/cart/delete/'.$item->id) }}" style="color: #ff4d4d; text-decoration: none; font-size: 1.2rem;" title="Remove Item">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div style="flex: 1; min-width: 300px;">
        <div class="jalt-card" style="padding: 25px; position: sticky; top: 20px;">
            <h4 style="margin-top: 0; margin-bottom: 20px; font-weight: bold; border-bottom: 1px solid #eee; padding-bottom: 10px;">Trial Summary</h4>
            
            <div style="display: flex; justify-content: space-between; margin-bottom: 12px; color: #666;">
                <span>Product Price</span>
                <span>Tk {{ number_format($subtotal, 0) }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 12px; color: #666;">
                <span>Delivery & Trial Fee</span>
                <span>Tk {{ number_format($delivery_charge, 0) }}</span>
            </div>
            
            <div style="border-top: 2px dashed #eee; margin: 15px 0; padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                <span style="font-weight: bold; font-size: 1.1rem;">Total Payable</span>
                <span style="font-weight: 900; font-size: 1.4rem; color: var(--jalt-orange);">Tk {{ number_format($subtotal + $delivery_charge, 0) }}</span>
            </div>

            <div style="background: #fff8f0; border: 1px solid #ffe8cc; color: #a35200; padding: 15px; border-radius: 10px; font-size: 0.85rem; margin-bottom: 20px; line-height: 1.5;">
                <i class="bi bi-info-circle-fill"></i> <strong>Trial Policy:</strong> আপনি শুধুমাত্র একটি পণ্যের দাম দিচ্ছেন। ডেলিভারি ম্যান আপনার পছন্দের সব সাইজ ও কালার নিয়ে আসবে। যেটা ফিট হবে সেটা রেখে বাকিগুলো সাথে সাথেই ফেরত দিন!
            </div>

            <form action="{{ url('/checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-jalt" style="width: 100%; padding: 15px; font-size: 1.1rem;">
                    Proceed to Trial Checkout <i class="bi bi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

</div>
@else
<div class="jalt-card" style="text-align: center; padding: 80px 20px; border: 2px dashed #ddd;">
    <i class="bi bi-cart-x" style="font-size: 4rem; color: #ccc;"></i>
    <h3 style="margin-top: 20px; color: #666;">Your cart is empty!</h3>
    <p style="color: #999; margin-bottom: 30px;">You haven't added any T-shirts for trial yet.</p>
    <a href="{{ url('/') }}" class="btn-jalt" style="text-decoration: none; display: inline-block;">Start Shopping</a>
</div>
@endif


</div\>
@endsection