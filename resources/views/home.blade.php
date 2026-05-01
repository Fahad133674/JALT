@extends('layouts.app')

@section('content')
<style>
    
    :root {
        --jalt-orange: #ee7300;
        --jalt-dark: #212529;
        --shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .filter-btn {
        padding: 10px 22px;
        border-radius: 30px;
        text-decoration: none;
        color: #555;
        background: white;
        border: 1px solid #ddd;
        font-weight: 600;
        transition: 0.3s;
        font-size: 0.9rem;
    }
    .filter-btn:hover, .filter-btn.active {
        background: var(--jalt-orange);
        color: white;
        border-color: var(--jalt-orange);
        box-shadow: 0 4px 12px rgba(238, 115, 0, 0.3);
    }

    .jalt-product-card {
        background: white;
        border-radius: 12px;
        transition: 0.4s;
        border: 1px solid #eee;
        overflow: hidden;
    }
    .jalt-product-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow);
        border-color: transparent;
    }

    .trial-option { cursor: pointer; }
    .trial-option input { display: none; }
    .trial-option span {
        display: inline-block;
        padding: 4px 10px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: bold;
        transition: 0.2s;
    }
    .trial-option input:checked + span {
        background: var(--jalt-orange);
        color: white;
        border-color: var(--jalt-orange);
    }
</style>

<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    
    <div style="margin-bottom: 40px; text-align: center;">
        <h2 style="font-weight: 800; color: var(--jalt-dark); margin-bottom: 10px; font-size: 2.2rem;">
            Browse Our Collection
        </h2>
        <p style="color: #666; margin-bottom: 25px;">Try up to 5 sizes/colors at home before you pay!</p>
        
        <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
            <a href="{{ url('/') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">All Products</a>
            <a href="{{ url('/?category=drop-shoulder') }}" class="filter-btn {{ request('category') == 'drop-shoulder' ? 'active' : '' }}">Drop Shoulder</a>
            <a href="{{ url('/?category=hoodie') }}" class="filter-btn {{ request('category') == 'hoodie' ? 'active' : '' }}">Hoodies</a>
            <a href="{{ url('/?category=regular') }}" class="filter-btn {{ request('category') == 'regular' ? 'active' : '' }}">Regular Fit</a>
            <a href="{{ url('/?category=full-sleeve') }}" class="filter-btn {{ request('category') == 'full-sleeve' ? 'active' : '' }}">Full Sleeve</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px;">
        @foreach($products as $product)
        <div class="jalt-product-card">
            <a href="{{ url('/product/'.$product->id) }}" style="display: block; overflow: hidden;">
                <img src="{{ asset('uploads/'.$product->image) }}" alt="{{ $product->name }}" 
                    style="width: 100%; height: 320px; object-fit: cover; transition: 0.6s;" 
                    onmouseover="this.style.transform='scale(1.1)'" 
                    onmouseout="this.style.transform='scale(1)'">
            </a>
            
            <div style="padding: 20px; text-align: center;">
                <h3 style="font-size: 1.1rem; margin: 0 0 10px 0; color: #333; height: 2.4rem; overflow: hidden; line-height: 1.2;">{{ $product->name }}</h3>
                <p style="font-size: 0.85rem; color: #777; margin-bottom: 15px; height: 1.3rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $product->description }}</p>
                <p style="font-size: 1.3rem; font-weight: 900; color: var(--jalt-orange); margin-bottom: 15px;">Tk {{ number_format($product->price, 0) }}</p>

                

                <form action="{{ url('/cart/add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div style="margin-bottom: 12px; background: #fcfcfc; border: 1px solid #f0f0f0; padding: 10px; border-radius: 8px;">
                        <span style="font-size: 0.7rem; font-weight: bold; color: #aaa; display: block; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Sizes for Trial:</span>
                        <div style="display: flex; justify-content: center; gap: 6px; flex-wrap: wrap;">
                            @if($product->sizes)
                                @foreach(explode(',', $product->sizes) as $size)
                                    <label class="trial-option">
                                        <input type="checkbox" name="size[]" value="{{ trim($size) }}">
                                        <span>{{ trim($size) }}</span>
                                    </label>
                                @endforeach
                            @else
                                <small style="color: #ccc;">Free Size</small>
                            @endif
                        </div>
                    </div>

                    <div style="margin-bottom: 20px; background: #fcfcfc; border: 1px solid #f0f0f0; padding: 10px; border-radius: 8px;">
                        <span style="font-size: 0.7rem; font-weight: bold; color: #aaa; display: block; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Colors for Trial:</span>
                        <div style="display: flex; justify-content: center; gap: 6px; flex-wrap: wrap;">
                            @if($product->colors)
                                @foreach(explode(',', $product->colors) as $color)
                                    <label class="trial-option">
                                        <input type="checkbox" name="color[]" value="{{ trim($color) }}">
                                        <span>{{ trim($color) }}</span>
                                    </label>
                                @endforeach
                            @else
                                <small style="color: #ccc;">Default</small>
                            @endif
                        </div>
                    </div>

                    @if(auth()->check() && auth()->user()->role == 'admin')
                        <div style="background: #f1f1f1; color: #999; padding: 12px; border-radius: 8px; font-size: 0.8rem; font-weight: bold; border: 1px dashed #ccc;">
                            <i class="bi bi-shield-lock"></i> Admin Preview Mode
                        </div>
                    @else
                        <button type="submit" class="btn-jalt" style="width: 100%; border-radius: 8px; padding: 14px; font-size: 0.9rem; border: none; font-weight: bold;">
                            <i class="bi bi-bag-plus me-1"></i> Add to Trial Cart
                        </button>
                    @endif
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection