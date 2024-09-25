@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    {{-- Esta directiva es una mezcla del if y el forerach --}}
    {{-- @forelse ($posts as $post)
       <p>Sí hay posts</p>
    @empty
        <p>No hay posts</p>
    @endforelse --}}
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}"
                            class="rounded">
                    </a>
                    <p class="text-xs text-gray-500">{{ $post->user->username }}</p>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center ">No hay Posts, sigue a alguien para poder mostrar sus posts</p>
    @endif
@endsection
