@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('titulo-modulo', 'Colección de Libros')

@section('menu_seleccionado')
    @include('modules.partials.nav-interface')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-interface.css') }}">
@endsection

@section('content')
    <div class="buscar-libros">
        <div class="col-6 offset-3">
                <form action="{{ route('interface.index') }}" method="GET" class="buscar-libros" value="{{ request('query') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="query" class="form-control" placeholder="Ingrese Título del Libro a Buscar"
                            aria-label="Recipient's username" aria-describedby="boton-buscar">
                        <button class="btn btn-outline-secondary" type="submit" id="boton-buscar"><i
                                id="icono-bus" class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
        </div>
    </div>

    <div class="container contenedor-libros">
        <div class="card-container">

            @if ($libros->isEmpty())
            <div class="container text-center mt-4 mb-4">
                <h2>¡ NO HAY LIBROS DISPONIBLES EN LA BIBLIOTECA !</h2>
            </div>
            @else
                @foreach ($libros as $libro)
                    <div class="card-item card">
                        <div class="row no-gutters">
                            <div class="col-5">
                                @if ($libro->caratula != "")
                                    <img class="card-img-top" src="{{ asset('storage') . '/' . $libro->caratula }}" alt="Title" />                                    
                                @else
                                    <img class="card-img-top" src="{{ asset('libs/img/no_disponible.png') }}" alt="Title" />
                                @endif

                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $libro->titulo }}</h4>
                                    <hr>
                                    <p class="card-text">{{ $libro->autor }} <br>
                                        Edición Nº {{ $libro->edicion }}
                                    </p>
                                </div>
                            </div>
                            @if ($libro->disponibles > 0)
                                <span class="bg-primary py-1 px-2 rounded">Ejemplares Disponibles</span>
                            @else
                                <span class="bg-danger p-1 px-2 rounded">Sin Ejemplares</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
