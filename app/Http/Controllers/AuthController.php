<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('failed_status', 'Your account is not active yet!');
            }

            $request->session()->regenerate();

            if(Auth::user()->role_id == 1) {
                return redirect()->intended('/dashboard');
            }

            if(Auth::user()->role_id == 2) {
                return redirect()->intended('/dashboard-client');
            }
        }
 
        return back()->with('failed', 'Login Failed!');
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    
    public function registerView() {
        return view('register');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:3',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $validated['password'] = Hash::make($request->password);
        User::create($validated);

        return redirect('/login')->with('success', 'Your Registration is Success. Please Wait Until Admin Activated Your Account');
    }
}
