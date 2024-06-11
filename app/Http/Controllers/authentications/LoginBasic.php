<?php
namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    // Check if user exists and password is correct
    if ($user && Hash::check($request->password, $user->password)) {
      // Authenticate the user
      Auth::login($user);

      // Authentication passed, redirect to dashboard
      return redirect()->intended('/dashboard');
    }
    $errors = [];

    // Check if the user exists with the provided email
    if (!$user) {
      $errors['email'] = 'The provided credentials do not match our records.';
    } else {
      // Password is incorrect
      $errors['password'] = 'The provided password is incorrect.';
    }

    // Redirect back with input and errors
    return redirect()->back()->withInput($request->only('email'))->withErrors($errors);
  }
}
