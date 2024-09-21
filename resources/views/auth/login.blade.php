@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-6/12 md:p-5 mb-6 md:mb-0">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen Login de Usuarios" class="rounded-md">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('login')}}" method="POST"  novalidate>
                @csrf
                @if (session('mensaje'))
                <p class="bg-red-500 text-white rounded p-2 uppercase text-center my-3 text-sm">{{session('mensaje') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email de registro" value="{{old('email')}}"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500"@enderror">
                    @error('email')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold ">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500"@enderror">
                    @error('password')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
