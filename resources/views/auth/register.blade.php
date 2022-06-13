@extends('layouts.app')
@section('titulo')
  Registrate en DevStagram
@endsection
@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen resitro de usuarios">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf
        <div class="mb-5">
          <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
            Nombre
          </label>
          <input 
            type="text"
            name="name"
            id="name"
            placeholder="Nombre"
            class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror"
            value="{{ old('name') }}"
          >
          @error('name')
            <p class="text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Username
          </label>
          <input 
            type="text"
            name="username"
            id="username"
            placeholder="Nombre de Usuario"
            class="border p-3 w-full rounded-lg @error('username') border-red-600 @enderror"
            value="{{ old('username') }}"
          >
          @error('username')
            <p class="text-red-600">{{ $message }}</p>
          @enderror
        </div>
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
        <div class="mb-5">
          <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
            Confirmar Contraseña
          </label>
          <input 
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            placeholder="Confirmar contraseña"
            class="border p-3 w-full rounded-lg"
          >
        </div>
        <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
      </form>
    </div>
  </div>
@endsection