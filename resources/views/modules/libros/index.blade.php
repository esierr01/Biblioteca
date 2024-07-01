@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

{{-- @section('titulo-modulo', 'Menu Principal') --}}

@section('menu_seleccionado')
    @include('modules.partials.nav-menu')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('content')
    <div class="buscar-libros">
        <div class="col-6 offset-3">
            <form action="{{ route('interface.index') }}" method="GET" class="buscar-libros" value="{{ request('query') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="query" class="form-control"
                        placeholder="Ingrese Título del Libro a Buscar" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="container contenedor-index">
        <table class="table">
            <thead>
                <tr>
                    <th>Carátula</th>
                    <th>Título</th>
                    <th>Publicación</th>
                    <th>Autor</th>
                    <th>Edición</th>
                    <th>Ejemplares</th>
                    <th>Disponibles</th>
                    <th>Fecha Carga</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>
                            <img class="portada-libro" src="{{ $libro->caratula }}" alt="Title" />
                        </td>
                        <td class="text-primary">{{ $libro->titulo }}</td>
                        <td>{{ $libro->ano_publica }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->edición }}</td>
                        <td>{{ $libro->ejemplares }}</td>
                        <td>{{ $libro->disponibles }}</td>
                        <td>{{ $libro->created_at }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle btn-blue" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Opciones
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Editar</a></li>
                                    <li><a class="dropdown-item" href="#">Eliminar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
