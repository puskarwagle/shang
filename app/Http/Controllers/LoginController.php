<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UnapprovedUser;

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
      $unapprovedUser = new UnapprovedUser;
      $unapprovedUser->email = $email;
      $unapprovedUser->password = $password;
      $unapprovedUser->save();

      return redirect()->intended('login')->with('success', 'Account request submitted successfully! Wait for approval. Thank you.');
    }
    
    public function showUsers()
    {
      $unapprovedUsers = UnapprovedUser::all();
      $approvedUsers = User::all();
      return view('allusers', [
          'unapprovedUsers' => $unapprovedUsers,
          'approvedUsers' => $approvedUsers
      ]);
    }

}
