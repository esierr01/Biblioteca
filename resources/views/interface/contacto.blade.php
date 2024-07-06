@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('titulo-modulo', 'Contacto')

@section('menu_seleccionado')
    @include('modules.partials.nav-interface')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-interface.css') }}">
@endsection

@section('content')
    <div class="container contenedor-contacto">
        <div class="card col-8 offset-2">
            <div class="row d-flex mx-auto">
                <div class="col-12 p-5 datos-contacto">
                    Emmanuel Sierra Pacheco <br><br>
                    emmanuel.sierra@gmail.com <br><br>
                    +58 412 6009860
                </div>
            </div>
        </div>
    </div>
@endsection
