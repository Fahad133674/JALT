<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister() { 
        return view('auth.register'); 
        }
        
    public function showLogin() { 
        return view('auth.login'); 
        }

    // registration logic
    public function register(Request $request)
    {
        // seller email list
        $sellers = ['fahad@gmail.com', 'zia@gmail.com', 'mihad@gmail.com'];

        // check email to set rule
        $role = in_array($request->email, $sellers) ? 'admin' : 'customer';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'role' => $role
        ]);

        Auth::login($user);

        // redirect based on rule after register
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        }
        return redirect('/');
    }

    // login logic
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // to show dashboard based on role
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            }
            return redirect('/');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('auth.profile', ['user' => $user]);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}