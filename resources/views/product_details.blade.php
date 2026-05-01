@extends('layouts.app')

@section('content')
<style>
    
    :root {
        --jalt-orange: #ee7300;
        --jalt-dark: #1a1a1a;
    }

    .breadcrumb-item a {
        color: var(--jalt-orange);
        text-decoration: none;
        font-weight: 500;
    }

    .product-image-container {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        position: sticky;
        top: 20px;
    }

    .trial-selection-box {
        background: #fcfcfc;
        border: 1px solid #f0f0f0;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 25px;
    }

    
    .option-selector {
        display: none;
    }
    .option-label {
        display: inline-block;
        padding: 8px 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        font-weight: 600;
        margin-bottom: 5px;
        background: white;
        color: #555;
    }
    .option-selector:checked + .option-label {
        background-color: var(--jalt-orange);
        color: white;
        border-color: var(--jalt-orange);
        box-shadow: 0 4px 10px rgba(238, 115, 0, 0.3);
    }
    .option-label:hover {
        border-color: var(--jalt-orange);
        color: var(--jalt-orange);
    }

    .price-tag {
        font-size: 2rem;
        font-weight: 900;
        color: var(--jalt-orange);
        margin: 15px 0;
    }

    .trial-badge {
        display: inline-block;
        background: #fff4e6;
        color: #d46600;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>

<div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
    <div style="display: flex; gap: 50px; flex-wrap: wrap;">
        
        <div style="flex: 1; min-width: 300px;">
            <div class="product-image-container">
                <img src="{{ asset('uploads/'.$product->image) }}" alt="{{ $product->name }}" 
                    style="width: 100%; border-radius: 12px; object-fit: contain; max-height: 600px;">
            </div>
        </div>

        <div style="flex: 1; min-width: 350px;">
            <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                <ol style="display: flex; list-style: none; padding: 0; font-size: 0.9rem; gap: 10px;">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li style="color: #ccc;">/</li>
                    <li style="color: #888;">{{ $product->name }}</li>
                </ol>
            </nav>

            <span class="trial-badge"><i class="bi bi-truck"></i> Home Trial Available</span>
            <h1 style="font-size: 2.5rem; font-weight: 800; color: var(--jalt-dark); margin-top: 0;">{{ $product->name }}</h1>
            
            <div class="price-tag">Tk {{ number_format($product->price, 0) }}</div>
            
            <p style="line-height: 1.8; color: #666; font-size: 1.05rem; margin-bottom: 30px;">
                {{ $product->description }}
            </p>
            
            <hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 30px;">

            <form action="{{ url('/cart/add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="trial-selection-box">
                    <label style="font-weight: 700; color: #444; display: block; margin-bottom: 15px;">
                        <i class="bi bi-rulers"></i> Select Sizes for Trial:
                    </label>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @if($product->sizes)
                            @foreach(explode(',', $product->sizes) as $size)
                                <div>
                                    <input class="option-selector" type="checkbox" name="size[]" value="{{ trim($size) }}" id="size_{{ $loop->index }}">
                                    <label class="option-label" for="size_{{ $loop->index }}">
                                        {{ trim($size) }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <span style="color: #999;">Standard Size Only</span>
                        @endif
                    </div>
                </div>

                <div class="trial-selection-box">
                    <label style="font-weight: 700; color: #444; display: block; margin-bottom: 15px;">
                        <i class="bi bi-palette"></i> Select Colors for Trial:
                    </label>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @if($product->colors)
                            @foreach(explode(',', $product->colors) as $color)
                                <div>
                                    <input class="option-selector" type="checkbox" name="color[]" value="{{ trim($color) }}" id="color_{{ $loop->index }}">
                                    <label class="option-label" for="color_{{ $loop->index }}">
                                        {{ trim($color) }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <span style="color: #999;">Standard Color Only</span>
                        @endif
                    </div>
                </div>

                <div style="margin-top: 30px;">
                    @if(auth()->check() && auth()->user()->role == 'admin')
                        <div style="background: #f8f9fa; border: 1px dashed #ccc; color: #888; padding: 15px; border-radius: 10px; text-align: center; font-weight: bold;">
                             <i class="bi bi-shield-lock"></i> Admin: Order feature disabled for your role.
                        </div>
                    @else
                        <button type="submit" class="btn-jalt" style="width: 100%; padding: 18px; font-size: 1.2rem; border-radius: 12px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                            <i class="bi bi-cart-plus-fill"></i> Add to Trial Cart
                        </button>
                    @endif
                </div>
            </form>
            
            <div style="margin-top: 40px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="display: flex; align-items: center; gap: 10px; color: #555; font-size: 0.9rem;">
                    <i class="bi bi-arrow-repeat" style="font-size: 1.5rem; color: var(--jalt-orange);"></i>
                    <span>Instant Trial & Return</span>
                </div>
                <div style="display: flex; align-items: center; gap: 10px; color: #555; font-size: 0.9rem;">
                    <i class="bi bi-shield-check" style="font-size: 1.5rem; color: var(--jalt-orange);"></i>
                    <span>100% Cotton Fabric</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection