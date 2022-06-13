<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DevStagram - @yield('titulo')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }} ">
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100">
  <header class="p-5 border-b bg-white shadow">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-3xl font-black">DevStagram</h1>
      @auth
        <nav class="flex gap-3 justify-end items-center">
          <a href="{{ route('posts.create') }}"
            class="flex items-center gap-2 bg-white border-2 border-black p-1 hover:bg-gray-50 rounded-lg cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
          </a>
          <a class="font-bold uppercase text-gray-600 hover:text-black text-sm" href="{{ route('posts.index', auth()->user()->username) }}">{{ auth()->user()->username }}</a>
          <form action="{{ route('logout') }}" method="POST" class="text-sm">
            @csrf
            <button type="submit" class="font-bold uppercase text-gray-600 hover:text-black">Cerrar Sesión</button>
          </form>
        </nav>
      @endauth
      @guest
        <nav class="flex gap-2 items-center">
          <a class="font-bold uppercase text-gray-600 hover:text-black text-sm" href="/login">Login</a>
          <a class="font-bold uppercase text-gray-600 hover:text-black text-sm" href="{{ route('register') }}">Crear
            Cuenta</a>
        </nav>
      @endguest
    </div>
  </header>
  <main class="container mx-auto mt-10">
    <h2 class="font-black text-center text-3xl mb-10" 23222>
      @yield('titulo')
    </h2>
    @yield('contenido')
  </main>
  <footer class="mt-10 text-center p-5 text-gray-500 font-bold">
    DevStagram - Todos los Derechos Reservados &copy;
    {{ now()->year }}
  </footer>
</body>

</html>
