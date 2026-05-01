@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 75vh; padding: 20px 0;">
    <div class="jalt-card" style="width: 100%; max-width: 500px;">
        <div class="jalt-card-body" style="padding: 40px; text-align: center;">
            
            <div style="margin-bottom: 25px;">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=ee7300&color=fff&size=128" 
                    style="width: 120px; height: 120px; border-radius: 50%; border: 4px solid #fff; box-shadow: var(--shadow);">
            </div>
            
            <h2 style="margin: 0; font-weight: bold; color: var(--jalt-dark);">{{ $user->name }}</h2>
            
            <div style="margin: 15px 0 30px 0;">
                <span style="background-color: {{ $user->role == 'admin' ? '#dc3545' : 'var(--jalt-orange)' }}; 
                            color: white; padding: 6px 15px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; display: inline-block;">
                    {{ ucfirst($user->role) }}
                </span>
            </div>
            
            <div style="text-align: left; background: #f9f9f9; padding: 20px; border-radius: 10px;">
                <div style="margin-bottom: 15px;">
                    <label style="color: #888; font-size: 0.8rem; display: block; margin-bottom: 3px; font-weight: bold;">Email Address</label>
                    <span style="font-weight: 500; color: #333;">{{ $user->email }}</span>
                </div>
                
                <div style="margin-bottom: 5px;">
                    <label style="color: #888; font-size: 0.8rem; display: block; margin-bottom: 3px; font-weight: bold;">Delivery Address</label>
                    <span style="font-weight: 500; color: #333;">{{ $user->address ?? 'Not provided' }}</span>
                </div>
            </div>
            
            <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                @if($user->role == 'admin')
                    <a href="/admin/dashboard" class="btn-jalt" style="background: #333; text-decoration: none;">Go to Dashboard</a>
                @endif
                
                <a href="/logout" class="btn-jalt" style="background: #f8d7da; color: #721c24; text-decoration: none; border: 1px solid #f5c6cb;">
                    <i class="bi bi-box-arrow-right"></i> Logout Account
                </a>
            </div>
        </div>
    </div>
</div>
@endsection