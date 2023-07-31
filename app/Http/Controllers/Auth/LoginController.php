<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'string|required',
            'password' => 'string|required',
        ]);

        if (Auth::attempt($request->only('login', 'password'))) {
            if (Auth::user()->isAdmin != 1) {
                Auth::logout();
                return back()->withErrors(['msg' => 'account not found']);
            }
            return redirect()->route('users');
        }
        return back()->withErrors(['msg' => 'account not found']);
    }

    public function logout(Request $request)
    {

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();

        return redirect()->route('login');
    }
}
