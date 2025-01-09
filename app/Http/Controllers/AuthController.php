<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function _login(Request $request){
        $credentials = $request->only('email','password');

        $remember = $request->has('remember'); // Check if 'remember' is checked

        if (Auth::attempt($credentials, $remember)) {
            // Set cookies if remember me is checked
            if ($remember) {
                cookie()->queue('email', $request->email, 5); // Store for 5 minutes
                cookie()->queue('remember', true, 5);
            } else {
                cookie()->queue(cookie()->forget('email'));
                cookie()->queue(cookie()->forget('remember'));
            }

            return redirect()->intended('home');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function _register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'contact' => 'required|string|min:11|unique:users'
        ]);
    
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'contact' => $request->contact,
            ]);
    
            Auth::login($user);
    
            // Success message
            return redirect()->route('home');
        } catch (\Exception $e) {
            // Error message
            return redirect()->back()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
