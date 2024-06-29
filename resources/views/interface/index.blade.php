@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/style-interface.css') }}">
@endsection

@section('content')
    <div class="container mt-5 contenedor-titulo">
        Colección de Libros
    </div>

    <div class="contenedor-modulo">
        @if ($libros->isEmpty())
            <h2>¡¡ No hay libros disponibles en la Biblioteca !!</h2>
        @else
            @foreach ($libros as $libro)
                <div class="tarjeta">
                    <div class="card-body">
                        <p class="titulo-libro">{{ $libro->titulo }}</p>
                        <img src="{{ $libro->caratula }}" alt="caratula">
                        <p class="sub-titulo">Autor: {{ $libro->autor }}</p>
                        <p class="sub-titulo">Año: {{ $libro->ano_publica }}</p>
                    </div>
                </div>
            @endforeach


        @endif
    </div>
@endsection
