@extends('layouts.app')
@section('titulo')
    Perfil: {{ $user->username }}
@endsection
@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row items-center">
            <div class="w-8/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de Usuario">
            </div>
            <div class="flex flex-col items-center md:block md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl mb-3">{{ $user->username }}</p>
                <div class="md:flex md:justify-between md:items-center gap-2">
                    <p class="flex justify-start gap-1 text-gray-800 text-sm mb-3 md:mb-0 font-bold">
                        0<span class="font-normal">Publicaciones</span>
                    </p>
                    <p class="flex justify-start gap-1 text-gray-800 text-sm mb-3 md:mb-0 font-bold">
                        0<span class="font-normal">Seguidores</span>
                    </p>
                    <p class="flex justify-start gap-1 text-gray-800 text-sm mb-3 md:mb-0 font-bold">
                        0<span class="font-normal">Seguidos</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="">
                        <img src="{{ asset('img/uploads/' . $post->imagen) }}" alt="Imagen del Post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection