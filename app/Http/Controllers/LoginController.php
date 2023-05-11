<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();

        if ($user && $user->password === $password) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors(['message' => 'Email or Password melena!!']);
        }
    }

    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();

        if ($user && $user->password === $password) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors(['message' => 'Email or Password melena!!']);
        }
    }
}
