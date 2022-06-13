<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => ['required', 'max:35'],
      'username' => ['required', 'unique:users', 'min:3', 'max:20'],
      'email' => ['required', 'unique:users', 'email', 'max:60'],
      'password' => ['required','confirmed',Password::min(8)->letters()
      ->mixedCase()->numbers()->symbols()->uncompromised()]
    ]);
  }
}
