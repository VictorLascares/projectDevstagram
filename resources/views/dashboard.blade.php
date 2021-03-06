@extends('layouts.app')
@section('titulo')
    Perfil: {{ $user->username }}
@endsection
@section('contenido')
    <div class="flex justify-center border-b-2 border-b-gray-200 pb-4">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row items-center">
            <div class="w-8/12 px-5 pb-5">
                <img class="rounded-full" src="{{ $user->imagen ? asset('img/perfiles/'.$user->imagen) : asset('img/usuario.svg') }}" alt="Imagen de Usuario">
            </div>
            <div class="flex flex-col items-center md:block md:w-8/12 lg:w-6/12 px-5">
                <div class="flex gap-2 items-center mb-2">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a class="hover:bg-gray-200 font-bold text-sm bg-gray-100 py-1 px-2 border-gray-200 border-2 rounded-lg" href="{{ route('perfil.index') }}">Editar perfil</a>
                        @else
                            @if ($user->siguiendo( auth()->user() ))
                                <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input 
                                        type="submit" 
                                        value="Dejar de seguir"
                                        class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-1 px-5 rounded-md cursor-pointer"
                                    >
                                </form>
                            @else
                                <form action="{{ route('users.follow', $user) }}" method="POST">
                                    @csrf
                                    <input 
                                        type="submit" 
                                        value="Seguir"
                                        class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-1 px-5 rounded-md cursor-pointer"
                                    >
                                </form>
                            @endif
                        @endif
                    @endauth
                </div>
                <div class="md:flex md:justify-between md:items-center gap-5">
                    <p class="flex justify-start gap-1 text-gray-800 text-sm mb-3 md:mb-0 font-bold">
                        {{$user->posts->count()}}<span class="font-normal">publicaciones</span>
                    </p>
                    <p class="flex justify-start gap-1 text-gray-800 text-sm mb-3 md:mb-0 font-bold">
                        {{$user->followers->count()}}<span class="font-normal">@choice('seguidor|seguidores', $user->followers->count())</span>
                    </p>
                    <p class="flex justify-start gap-1 text-gray-800 text-sm mb-3 md:mb-0 font-bold">
                        {{$user->followings->count()}}<span class="font-normal">@choice('seguido|seguidos', $user->followings->count())</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div class="cursor-pointer">
                        <a class="relative" href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                            <img src="{{ asset('img/uploads/' . $post->imagen) }}" alt="Imagen del Post {{ $post->titulo }}">
                            <div class="absolute top-0 bottom-0 left-0 right-0 hover:bg-[rgba(0,0,0,.3)]"></div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">{{ $posts->links('pagination::tailwind') }}</div>
        @else
            <p class="text-gray-600 text-xl text-center font-bold">Todavia no hay publicaciones</p>
        @endif
    </section>
@endsection