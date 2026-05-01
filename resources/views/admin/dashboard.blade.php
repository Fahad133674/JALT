@extends('layouts.app')

@section('content')
<div style="display: flex; gap: 30px; flex-wrap: wrap;">
    
    <div style="flex: 1; min-width: 250px;">
        <div class="jalt-card" style="padding: 10px; border-radius: 10px;">
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 5px;">
                    <a href="{{ url('/admin/dashboard') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; background: var(--jalt-orange); color: white; font-weight: bold;">
                       <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li style="margin-bottom: 5px;">
                    <a href="{{ url('/admin/products') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555; transition: 0.3s;"
                       onmouseover="this.style.background='#f0f0f0'" onmouseout="this.style.background='transparent'">
                       <i class="bi bi-bag"></i> Manage Products
                    </a>
                </li>
                <li style="margin-bottom: 5px;">
                    <a href="{{ url('/admin/orders') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555; transition: 0.3s;"
                       onmouseover="this.style.background='#f0f0f0'" onmouseout="this.style.background='transparent'">
                       <i class="bi bi-cart-check"></i> Manage Orders
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/users') }}" 
                       style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555; transition: 0.3s;"
                       onmouseover="this.style.background='#f0f0f0'" onmouseout="this.style.background='transparent'">
                       <i class="bi bi-people"></i> Manage Users
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div style="flex: 3; min-width: 300px;">
        <h2 style="margin-bottom: 30px; font-weight: bold; color: var(--jalt-dark);">Admin Overview</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            
            <div style="background: #4e73df; color: white; padding: 25px; border-radius: 15px; box-shadow: var(--shadow);">
                <span style="font-size: 0.8rem; text-transform: uppercase; opacity: 0.8; font-weight: bold;">Total Users</span>
                <h2 style="margin: 10px 0 0 0; font-size: 2.2rem;">{{ $totalUsers }}</h2>
            </div>

            <div style="background: #1cc88a; color: white; padding: 25px; border-radius: 15px; box-shadow: var(--shadow);">
                <span style="font-size: 0.8rem; text-transform: uppercase; opacity: 0.8; font-weight: bold;">Total Products</span>
                <h2 style="margin: 10px 0 0 0; font-size: 2.2rem;">{{ $totalProducts }}</h2>
            </div>

            <div style="background: #f6c23e; color: #333; padding: 25px; border-radius: 15px; box-shadow: var(--shadow);">
                <span style="font-size: 0.8rem; text-transform: uppercase; opacity: 0.8; font-weight: bold;">Total Orders</span>
                <h2 style="margin: 10px 0 0 0; font-size: 2.2rem;">{{ $totalOrders }}</h2>
            </div>
            
        </div>

        <div style="margin-top: 40px; background: white; padding: 30px; border-radius: 15px; border-left: 5px solid var(--jalt-orange); box-shadow: var(--shadow);">
            <h5 style="margin-top: 0; font-size: 1.2rem;">Welcome, Admin!</h5>
            <p style="color: #666; line-height: 1.6;">From here you can manage your T-shirt inventory, view trial requests from customers, and manage user accounts.</p>
            <a href="{{ url('/admin/orders') }}" 
                style="display: inline-block; margin-top: 15px; color: var(--jalt-orange); text-decoration: none; font-weight: bold; border-bottom: 2px solid var(--jalt-orange); padding-bottom: 3px;">
                View Recent Orders <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection