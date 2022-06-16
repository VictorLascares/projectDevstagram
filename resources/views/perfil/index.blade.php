@extends('layouts.app')
@section('titulo')
    Editar Perfil:  {{ auth()->user()->username }}
@endsection
@section('contenido')
    <div class="md:flex md:justify-center px-4">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}"
            enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                      Username
                    </label>
                    <input 
                      type="text"
                      name="username"
                      id="username"
                      placeholder="Nombre de usuario"
                      class="border p-3 w-full rounded-lg @error('username') border-red-600 @enderror"
                      value="{{ auth()->user()->username }}"
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
                      value="{{ auth()->user()->email }}"
                    >
                    @error('email')
                      <p class="text-red-600">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="mb-5">
                    <label for="current_password" class="mb-2 block uppercase text-gray-500 font-bold">
                      Contraseña Actual
                    </label>
                    <input 
                      type="password"
                      name="current_password"
                      id="current_password"
                      placeholder="Contraseña actual"
                      class="border p-3 w-full rounded-lg @if(session('mensaje')) border-red-600 @endif"
                    >
                    @if (session('mensaje'))
                        <p class="text-red-600">{{ session('mensaje') }}</p>
                    @endif
                  </div>
                  <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                      Nueva Contraseña
                    </label>
                    <input 
                      type="password"
                      name="password"
                      id="password"
                      placeholder="Nueva contraseña"
                      class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror"
                    >
                    @error('password')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                      Imagen Perfil
                    </label>
                    <input 
                      type="file"
                      name="imagen"
                      id="imagen"
                      class="border p-3 w-full rounded-lg"
                      accept=".jpg, .jpeg, .png"
                    >
                  </div>

                  <input type="submit" value="Guardar cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection