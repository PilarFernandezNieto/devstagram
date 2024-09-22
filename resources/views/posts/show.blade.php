@extends('layouts.app')


@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}" class="rounded">
            <div class="py-3">
                <p>0 Likes</p>
            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
        </div>
        <div class="md:w-1/2 md:p-5">
            <div class="shadow bg-white p-5 mb-5 rounded">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
                    @if (session('mensaje'))
                        <p class="bg-green-500 text-white rounded p-2 uppercase font-bold text-center my-3 text-sm">{{ session('mensaje') }}
                        </p>
                    @endif

                    <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="POST">
                        @csrf
                        <div class="mb-5 ">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold ">Comentario</label>
                            <textarea id="comentario" name="comentario" placeholder="Agrega tu comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500"@enderror">{{ old('comentario') }}</textarea>
                            @error('comentario')
                                <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection
