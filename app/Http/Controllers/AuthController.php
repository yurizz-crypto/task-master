<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        if (Session::has('user')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('login-form')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && password_verify($request->password, $user->password)) {
            Session::put('user', $user);

            if ($request->has('remember')) {
                $randomToken = Str::random(60);
                
                $user->remember_token = $randomToken;
                $user->save();

                Cookie::queue('remember_me_token', $randomToken, 525960); 
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials. Try Again.']);
    }

    public function logout()
    {
        $user = Session::get('user');
        
        if ($user) {
            $userModel = User::find($user->id);
            $userModel->remember_token = null;
            $userModel->save();
        }

        Session::forget('user');

        $cookie = Cookie::forget('remember_me_token');

        return redirect()->route('login-form')->withCookie($cookie);
    }
}
