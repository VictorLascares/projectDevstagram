@extends('layouts.app')
@section('titulo')
  Pagina Principal
@endsection
@section('contenido')
    <div class="container mx-auto flex justify-center px-2">
        <div class="lg:w-1/2">
            @forelse ($posts as $post)
                <div class="mb-4">
                    <div class="relative">
                        <img src="{{ asset('img/uploads/' . $post->imagen) }}" alt="Imagen de la publicacion con el titulo {{$post->titulo}}">
                        @auth
                            @if ( $post->user_id === auth()->user()->id )
                                <form class="absolute top-0 right-0" action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        title="Eliminar Publicación"
                                        type="submit" 
                                        class="bg-gray-300 opacity-30 hover:opacity-50"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="rgb(128,128,128)" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>

                    @auth
                        @if ( $post->checkLike(auth()->user()) )
                            <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="my-4">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-red-600 stroke-red-600" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg> 
                                    </button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                                @csrf
                                <div class="my-4">
                                    <button type="submit" title="Me gusta">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endauth
                    <div class="flex gap-2 items-center @guest mt-4 @endguest">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="#000" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <p>{{$post->likes->count()}} Likes</p>
                    </div>

                    <div>
                        <div class="flex flex-wrap gap-1">
                            <a href="{{ route('posts.index', $post->user) }}" class="font-bold hover:drop-shadow-md">{{ $post->user->username }}</a>
                            <p>{{ $post->descripcion }}</p>
                        </div>
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    </div>

                    <div class="max-h-96 overflow-y-scroll">
                        @if ($post->comentarios->count())
                            @foreach ($post->comentarios as $comentario)
                                <div class="flex gap-1 flex-wrap">
                                    <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold hover:drop-shadow-md">{{$comentario->user->username}}</a>
                                    <p>{{$comentario->comentario}}</p>
                                </div>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            @endforeach
                        @endif
                    </div>
                    @auth
                        <div class="my-5 border">
                            <form method="POST" action="{{ route('comentarios.store', ['post' => $post, 'user' => $post->user]) }}" class="flex items-center">
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
                </div>
            @empty
                <p>No hay post</p>
            @endforelse
            <div class="my-10">{{ $posts->links('pagination::tailwind') }}</div>
        </div>
    </div>
@endsection