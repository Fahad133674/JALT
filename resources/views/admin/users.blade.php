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
                        style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; color: #555;">
                        <i class="bi bi-cart-check"></i> Manage Orders
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/users') }}" 
                        style="display: block; padding: 12px 20px; text-decoration: none; border-radius: 8px; background: var(--jalt-orange); color: white; font-weight: bold;">
                        <i class="bi bi-people"></i> Manage Users
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div style="flex: 3; min-width: 300px;">
        <h2 style="margin-bottom: 25px; font-weight: bold; color: var(--jalt-dark);">System Users</h2>
        
        <div class="jalt-card" style="overflow: hidden;">
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #333; text-align: left;">
                            <th style="padding: 15px; color: white; font-size: 0.9rem; border-top-left-radius: 10px;">ID</th>
                            <th style="padding: 15px; color: white; font-size: 0.9rem;">Name</th>
                            <th style="padding: 15px; color: white; font-size: 0.9rem;">Email</th>
                            <th style="padding: 15px; color: white; font-size: 0.9rem;">Role</th>
                            <th style="padding: 15px; color: white; font-size: 0.9rem; text-align: center; border-top-right-radius: 10px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr style="border-bottom: 1px solid #eee; transition: 0.3s;" onmouseover="this.style.background='#fcfcfc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 15px; color: #888;">#{{ $user->id }}</td>
                            <td style="padding: 15px; font-weight: 500; color: #333;">{{ $user->name }}</td>
                            <td style="padding: 15px; color: #666;">{{ $user->email }}</td>
                            <td style="padding: 15px;">
                                <span style="background: {{ $user->role == 'admin' ? '#ffebee' : '#e3f2fd' }}; 
                                        color: {{ $user->role == 'admin' ? '#c62828' : '#1565c0' }}; 
                                        padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: bold; text-transform: uppercase;">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td style="padding: 15px; text-align: center;">
                                @if($user->role !== 'admin')
                                    <a href="/admin/delete-user/{{ $user->id }}" 
                                        style="color: #ff4d4d; text-decoration: none; font-size: 0.85rem; font-weight: bold; border: 1px solid #ff4d4d; padding: 5px 12px; border-radius: 6px; transition: 0.3s;"
                                        onmouseover="this.style.background='#ff4d4d'; this.style.color='white'"
                                        onmouseout="this.style.background='transparent'; this.style.color='#ff4d4d'"
                                        onclick="return confirm('Delete this user?')">
                                        Remove
                                    </a>
                                @else
                                    <span style="color: #bbb; font-size: 0.8rem; font-style: italic;">Protected</span>
                                @endif
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