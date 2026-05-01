<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JALT - Try Before You Pay</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        
        .main-wrapper {
            min-height: 80vh;
            padding-top: 20px;
        }

        
        .jalt-alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        
        .jalt-footer {
            background: #ffffff;
            border-top: 4px solid var(--jalt-orange);
            padding: 50px 0 20px 0;
            margin-top: 50px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>
    <header class="jalt-navbar">
        <div class="logo">
            <a href="{{ url('/') }}" style="color: white; text-decoration: none;">JALT</a>
        </div>
        
        <nav class="jalt-nav-links">
            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active-link' : '' }}">Home</a>
            
            @auth
                @if(Auth::user()->role == 'admin')
                    <a href="{{ url('/admin/dashboard') }}" style="background: #333; padding: 8px 15px; border-radius: 5px;">
                        <i class="bi bi-speedometer2"></i> Admin Panel
                    </a>
                @else
                    <a href="{{ url('/cart') }}" class="{{ Request::is('cart') ? 'active-link' : '' }}">
                        <i class="bi bi-cart3"></i> Cart
                    </a>
                @endif

                <a href="{{ url('/profile') }}" class="{{ Request::is('profile') ? 'active-link' : '' }}">Profile</a>
                
                <span style="margin-left: 20px; font-size: 0.9rem; opacity: 0.9;">
                    <i class="bi bi-person-circle"></i> Hello, <strong>{{ Auth::user()->name }}</strong>
                </span>
                
                <a href="{{ url('/logout') }}" style="margin-left: 15px; color: #fff;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}" style="border: 1px solid white; padding: 5px 15px; border-radius: 5px;">Register</a>
            @endauth
        </nav>
    </header>

    <main class="jalt-container main-wrapper">
        @if(session('success'))
            <div class="jalt-alert alert-success">
                <span><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="jalt-alert alert-error">
                <span><i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="jalt-footer">
        <div class="footer-grid">
            <div>
                <h4 style="color: var(--jalt-orange); margin-bottom: 15px;">JALT Clothing</h4>
                <p style="color: #666; line-height: 1.6;">Experience the new way of shopping. Order for trial, pay only for what you love.</p>
            </div>
            <div style="text-align: right;">
                <h5 style="margin-bottom: 15px;">Contact Us</h5>
                <div style="line-height: 2;">
                    <i class="bi bi-facebook" style="color: #1877F2;"></i> <a href="https://www.facebook.com/share/17z4PVGPco/" target="_blank" style="text-decoration: none; color: #333;">Our Facebook Page - <strong>Click Here</strong></a><br>
                    <i class="bi bi-envelope"></i> <a href="mailto:info@jalt.com" style="text-decoration: none; color: #333;">contacts@jalt.com</a><br>
                    <i class="bi bi-telephone"></i> 01858383321
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; JALT - JUST ANOTHER LEMON TREE...</p>
        </div>
    </footer>

    </body>
</html>