<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Type $var = null)
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (!auth()->attempt($request->only('email','password'))) {
         
            return back()->with('status','Invalid Login Request');
        }
        
        return redirect()->route('dashboard');
    }
}
