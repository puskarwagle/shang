<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
  public function authenticate(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    // manually check if the email and password are valid
    if (($email === 'systemadmin@admin.com' && $password === 'passcode') ||
        ($email === 'puskarwagle17@gmail.com' && $password === 'Shang5561')) {
          
        // authentication successful, redirect to dashboard
        return redirect()->intended('dashboard');
        
    } else {
        // authentication failed, redirect back with error message
        return redirect()->back()->withErrors(['message' => 'Invalid login credentials']);
    }
}  
}
