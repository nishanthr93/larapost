<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

//use Illuminate\Support\Carbon

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

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

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {

            return back()->with('status', 'Invalid Login Request');
        }

        return redirect()->route('posts');
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::firstOrNew(['email' =>  $data->email]);
        if (!$user->exists) {
            $user->name = $data->name;
            $user->username = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->avatar = $data->avatar;
            $user->email_verified_at = now();
            $user->save();
        }

        Auth::login($user);
    }
}
