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
                        style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555;">
                        <i class="bi bi-bag"></i> Manage Products
                    </a>
                </li>
                <li style="margin-bottom: 5px;">
                    <a href="{{ url('/admin/orders') }}" 
                        style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; background: var(--jalt-orange); color: white; font-weight: bold;">
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
        
        @if(session('success'))
            <div class="jalt-alert alert-success" style="margin-bottom: 20px; display: flex; justify-content: space-between;">
                {{ session('success') }}
                <span style="cursor: pointer;" onclick="this.parentElement.style.display='none'">&times;</span>
            </div>
        @endif

        <div class="jalt-card">
            <div class="jalt-card-header" style="display: flex; justify-content: space-between; align-items: center; background: #fff; color: var(--jalt-dark); border-bottom: 1px solid #eee;">
                <span><i class="bi bi-receipt me-2"></i> Recent Trial Orders</span>
                <span style="background: var(--jalt-orange); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem;">
                    {{ \App\Models\Order::count() }} Total
                </span>
            </div>
            
            <div style="overflow-x: auto; padding: 10px;">
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr style="background: #f8f9fa; text-align: left; border-bottom: 2px solid #eee;">
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Order ID</th>
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Customer Info</th>
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Trial Details</th>
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Total</th>
                            <th style="padding: 15px; color: #666; font-size: 0.9rem;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Order::latest()->get() as $order)
                        <tr style="border-bottom: 1px solid #eee; transition: 0.3s;" onmouseover="this.style.background='#fcfcfc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 15px; font-weight: bold; color: #444;">#Order-{{ $order->id }}</td>
                            <td style="padding: 15px;">
                                <div style="font-weight: 600;">{{ $order->name }}</div>
                                <div style="font-size: 0.8rem; color: #888;">{{ $order->phone }}</div>
                                <div style="font-size: 0.8rem; color: #888; max-width: 150px;">{{ $order->address }}</div>
                            </td>
                            <td style="padding: 15px;">
                                <p style="font-size: 0.85rem; color: #555; margin: 0; max-width: 200px; line-height: 1.4;">
                                    {{ $order->product_details }}
                                </p>
                            </td>
                            <td style="padding: 15px; font-weight: bold; color: var(--jalt-orange);">
                                Tk {{ number_format($order->total_price, 0) }}
                            </td>
                            <td style="padding: 15px;">
                                @if($order->status == 'pending')
                                    <a href="{{ url('/admin/orders/confirm/'.$order->id) }}" 
                                        style="background: #28a745; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.8rem; font-weight: bold; display: inline-block; box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);">
                                        Confirm Trial
                                    </a>
                                @else
                                    <span style="background: #e1f5fe; color: #039be5; padding: 5px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: bold; letter-spacing: 0.5px;">
                                        CONFIRMED
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 40px; text-align: center; color: #999;">No orders found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection