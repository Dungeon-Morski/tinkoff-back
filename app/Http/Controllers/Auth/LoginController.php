<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('admin');
        }
    }
}
