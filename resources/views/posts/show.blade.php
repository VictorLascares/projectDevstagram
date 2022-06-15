@extends('layouts.app')
@section('titulo')
    {{ $post->titulo }}
@endsection
@section('contenido')
    <div class="container mx-auto md:flex gap-4 px-2">
        <div class="md:w-1/2">
            <img src="{{ asset('img/uploads/' . $post->imagen) }}" alt="Imagen de la publicacion con el titulo {{$post->titulo}}">

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div>
                <div class="flex flex-wrap gap-1">
                    <a href="{{ route('posts.index', $post->user) }}" class="font-bold hover:drop-shadow-md">{{ $post->user->username }}</a>
                    <p>{{ $post->descripcion }}</p>
                </div>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <div class="md:w-1/2 md:pb-5 md:pr-5 md:pl-5 md:mt-0 flex flex-col-reverse md:flex-col">
            @auth
                <div class="my-5 border">
                    <form method="POST" action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" class="flex items-center">
                        @csrf
                        <div class="grow">
                            <textarea 
                            name="comentario"
                            id="comentario"
                            placeholder="Añade un comentario..."
                            class="focus:outline-none w-full focus:border-none bg-transparent p-3 resize-none @error('descripcion') border-red-600 @enderror"
                            ></textarea>
                            @error('comentario')
                            <p class="text-red-600 p-4">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="hover:drop-shadow-md flex-none my-auto cursor-pointer font-bold text-gray-500 p-3">
                            Publicar
                        </button>
                    </form>
                </div>
            @endauth
            <div class="max-h-96 overflow-y-scroll">
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                        <div class="flex gap-1 flex-wrap">
                            <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold hover:drop-shadow-md">{{$comentario->user->username}}</a>
                            <p>{{$comentario->comentario}}</p>
                        </div>
                        <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                    @endforeach
                @else
                    <p class="p-10 text-center">No hay comentarios todavia</p>
                @endif
            </div>
        </div>
    </div>
@endsection