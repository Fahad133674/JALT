@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 85vh; padding: 20px 0;">
    <div class="jalt-card" style="width: 100%; max-width: 500px;">
        <div class="jalt-card-header" style="text-align: center;">
            Create Account
        </div>
        <div class="jalt-card-body">
            <p style="text-align: center; color: #666; margin-bottom: 25px;">Join JALT to try clothes at home!</p>

            <form action="/register" method="POST">
                @csrf
                
                <div class="jalt-form-group">
                    <label class="jalt-label">Full Name</label>
                    <input type="text" name="name" class="jalt-input" placeholder="Enter your name" required>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Email Address</label>
                    <input type="email" name="email" class="jalt-input" placeholder="name@example.com" required>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Password</label>
                    <input type="password" name="password" class="jalt-input" placeholder="Create a password" required>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Shipping Address</label>
                    <textarea name="address" class="jalt-textarea" rows="3" placeholder="Enter your full address" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;"></textarea>
                </div>

                <div style="margin-top: 30px;">
                    <button type="submit" class="btn-jalt">
                        Register Now
                    </button>
                </div>

                <div style="text-align: center; margin-top: 25px;">
                    <span style="color: #777;">Already have an account?</span> 
                    <a href="/login" style="color: var(--jalt-orange); text-decoration: none; font-weight: bold; margin-left: 5px;">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection