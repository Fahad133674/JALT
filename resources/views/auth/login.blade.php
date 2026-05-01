@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    <div class="jalt-card" style="width: 100%; max-width: 450px;">
        <div class="jalt-card-header" style="text-align: center;">
            <h2 style="color:#ee7300">Welcome To JALT</h2>
        </div>
        <div class="jalt-card-body">
            
            @if(session('error'))
                <div class="jalt-alert alert-error" style="margin-bottom: 20px;">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                
                <div class="jalt-form-group">
                    <label class="jalt-label">Email Address</label>
                    <input type="email" name="email" class="jalt-input" placeholder="Enter your email" required>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Password</label>
                    <input type="password" name="password" class="jalt-input" placeholder="Enter password" required>
                </div>

                <div style="margin-top: 30px;">
                    <button type="submit" class="btn-jalt">
                        Login
                    </button>
                </div>

                <div style="text-align: center; margin-top: 25px;">
                    <span style="color: #777;">Don't have an account?</span> 
                    <a href="/register" style="color: var(--jalt-orange); text-decoration: none; font-weight: bold; margin-left: 5px;">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection