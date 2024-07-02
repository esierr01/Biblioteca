@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('titulo-modulo', 'Contacto')

@section('menu_seleccionado')
    @include('modules.partials.nav-interface')
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/style-interface.css') }}">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f0926b9a9.js" crossorigin="anonymous"></script>
    <script src="{{ asset('libs/js/main-interface.js') }}"></script>
@endsection

@section('content')
    <div class="container contenedor-contacto">
        <div class="card col-8 offset-2">
            <div class="row d-flex mx-auto">
                <div class="col-5 datos-contacto">
                    Emmanuel Sierra Pacheco <br>
                    emmanuel.sierra@gmail.com
                </div>

                <div class="col-7">
                    <iframe id="map" class="plano-ubicacion"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11924.93342035467!2d-66.941361!3d10.493389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDI5JzQ2LjInUyA2Nug1NicxOC45Ilc!5e0!3m2!1sen!2sus!4v1625063580761!5m2!1sen!2sus"
                        allowfullscreen class="p-2">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
