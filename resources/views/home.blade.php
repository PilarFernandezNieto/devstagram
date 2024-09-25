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
    <x-listar-post :posts="$posts"/>

@endsection
