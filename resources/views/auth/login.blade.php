@extends('layouts.app')
@section('titulo')
  Iniciar Sesión
@endsection
@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf
        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
            Correo Electronico
          </label>
          <input 
            type="email"
            name="email"
            id="email"
            placeholder="correo@example.com"
            class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror"
            value="{{ old('email') }}"
          >
          @error('email')
            <p class="text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
            Contraseña
          </label>
          <input 
            type="password"
            name="password"
            id="password"
            placeholder="Contraseña"
            class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror"
          >
          @error('password')
            <p class="text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
      </form>
    </div>
  </div>
@endsection