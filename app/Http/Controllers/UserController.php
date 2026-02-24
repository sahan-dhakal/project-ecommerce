<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $req->session()->regenerate();
        // ['email' => $req->email, 'password' => $req->password]
        if (Auth::attempt($req->only('email', 'password'))) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logoutUser()
    {
        Auth::logout();
        // request()->session()->invalidate();
        return redirect()->route('login');
    }
}
