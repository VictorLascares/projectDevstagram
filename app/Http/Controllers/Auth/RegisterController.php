<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    // Modificar el Request
    $request->request->add(['username' => Str::lower(str_replace(" ", "", $request->username))]);


    // Validacion
    $this->validate($request, [
      'name' => ['required', 'max:35'],
      'username' => ['required', 'unique:users', 'min:3', 'max:20'],
      'email' => ['required', 'unique:users', 'email', 'max:60'],
      'password' => ['required','confirmed',Password::min(8)->letters()
      ->mixedCase()->numbers()->symbols()->uncompromised()]
    ]);

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    // Redireccionar
    return redirect()->route('muro');
  }
}
