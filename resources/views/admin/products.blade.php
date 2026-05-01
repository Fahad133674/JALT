@extends('layouts.app')

@section('content')
<div style="display: flex; gap: 30px; flex-wrap: wrap; padding-top: 20px;">
    
    <div style="flex: 1; min-width: 250px;">
        <div class="jalt-card" style="padding: 10px; border-radius: 10px;">
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 5px;">
                    <a href="{{ url('/admin/dashboard') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555;">
                       <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li style="margin-bottom: 5px;">
                    <a href="{{ url('/admin/products') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; background: var(--jalt-orange); color: white; font-weight: bold;">
                       <i class="bi bi-bag"></i> Manage Products
                    </a>
                </li>
                <li style="margin-bottom: 5px;">
                    <a href="{{ url('/admin/orders') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555;">
                       <i class="bi bi-cart-check"></i> Manage Orders
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/users') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555;">
                       <i class="bi bi-people"></i> Manage Users
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div style="flex: 3; min-width: 300px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="margin: 0; font-weight: bold; color: var(--jalt-dark);">All Products</h2>
            <a href="{{ url('/admin/add-product') }}" class="btn-jalt_add_products" style="text-decoration: none; font-size: 0.9rem; padding: 10px 20px;">
                <i class="bi bi-plus-lg"></i> Add New Product
            </a>
        </div>
        
        @if(session('success'))
            <div class="jalt-alert alert-success" style="margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="jalt-card" style="overflow: hidden;">
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8f9fa; text-align: left; border-bottom: 2px solid #eee;">
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Product Name</th>
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Price</th>
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Category</th>
                            <th style="padding: 15px; color: #666; font-size: 0.9rem; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr style="border-bottom: 1px solid #eee; transition: 0.3s;" onmouseover="this.style.background='#fcfcfc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 15px; font-weight: 500; color: #333;">{{ $product->name }}</td>
                            <td style="padding: 15px; color: var(--jalt-orange); font-weight: bold;">Tk {{ number_format($product->price, 0) }}</td>
                            <td style="padding: 15px;">
                                <span style="background: #e3f2fd; color: #0d47a1; padding: 4px 10px; border-radius: 15px; font-size: 0.75rem; font-weight: bold; text-transform: uppercase;">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td style="padding: 15px; text-align: center;">
                                <div style="display: flex; justify-content: center; gap: 8px;">
                                    <a href="{{ url('/admin/edit-product/'.$product->id) }}" 
                                       style="background: #ffc107; color: #000; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.8rem; font-weight: bold;">
                                        Edit
                                    </a>
                                    <a href="{{ url('/admin/delete-product/'.$product->id) }}" 
                                       style="background: #ff4d4d; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.8rem; font-weight: bold;"
                                       onclick="return confirm('Are you sure?')">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection