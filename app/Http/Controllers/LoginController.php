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

        // check if the email and password are valid
        $user = User::where('email', $email)->first();

        if ($user && $user->password === $password) {
            // authentication successful, redirect to dashboard
            return redirect()->intended('dashboard');
        } else {
            // authentication failed, redirect back with error message
            return redirect()->back()->withErrors(['message' => 'Email or Password melena!!']);
        }
    }  
}
