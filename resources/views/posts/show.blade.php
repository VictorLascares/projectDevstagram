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
                <div class="flex flex-wrap justify-start gap-1">
                    <p class="font-bold">{{ $post->user->username }}</p>
                    <p>{{ $post->descripcion }}</p>
                </div>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @auth
            <div class="md:w-1/2 md:pb-5 md:pr-5 md:pl-5 border-t md:border-0 mt-3 md:mt-0">
                <div class="md:shadow mb-5">
                    <form action="" class="flex items-center">
                        <div class="grow">
                            <textarea 
                            name="comentario"
                            id="comentario"
                            placeholder="Añade un comentario..."
                            class="focus:outline-none w-full focus:border-none bg-transparent p-3 resize-none @error('descripcion') border-red-600 @enderror"
                            ></textarea>
                            @error('comentario')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class=" hover:drop-shadow-md flex-none my-auto cursor-pointer font-bold text-gray-500 p-3">
                            Publicar
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
@endsection