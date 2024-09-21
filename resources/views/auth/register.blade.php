@extends('layouts.app')

@section('titulo')
    Regístrate en DevStragram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-6/12 md:p-5 mb-6 md:mb-0">
           <img src="{{asset('img/registrar.jpg')}}" alt="Imagen Registro de Usuarios" class="rounded-lg">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold ">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg">
                    @error('name')
                        {{-- <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">El nombre es obligatorio</p> --}}
                        <p class="text-red-500 my-2 text-sm">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold ">Username</label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email de registro" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold ">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold ">Repetir Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

