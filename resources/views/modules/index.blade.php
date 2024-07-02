@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

{{-- @section('titulo-modulo', 'Menu Principal') --}}

@section('menu_seleccionado')
    @include('modules.partials.nav-backend')
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f0926b9a9.js" crossorigin="anonymous"></script>
    <script src="{{ asset('libs/js/main-interface.js') }}"></script>
@endsection

@section('content')
    <div class="container contenedor-libros">
        <div class="card col-md-10 offset-1 text-center mt-5 mb-5">
            <div class="jumbotron jumbotron-fluid bg-body-secondary p-2 rounded custom-fondo1">
                <div class="container">
                    <h1 class="display-6 mb-4 text-center">Bienvenido al Sistema BibliotecaUneti</h1>
                    <p class="lead fs-5 text-center">
                        Aplicación desarrollada por: <span class="fw-semibold"><strong>Emmanuel Sierra / CI
                                11048546</strong></span> como
                        entrega final de
                        <br>
                        la materia <span class="text-dark fw-semibold"><strong>Programación II (M2)</strong></span> del PNF
                        Ingeniería en Informática de la UNETI
                        La Aplicación fue desarrollada utilizando: <br>
                    <div class="text-center mt-4" id="lenguajes">
                        <a href="https://www.php.net/" title="Página WEB de PHP" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-php"></i></a>
                        <a href="https://laravel.com/" title="Página WEB de LARAVEL" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-laravel"></i></a>
                        <a href="https://www.w3schools.com/sql/default.asp" title="Página WEB de MYSQL" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-database"></i></a>
                        <a href="https://www.w3schools.com/html/default.asp" title="Página WEB de HTML" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-html5"></i></a>
                        <a href="https://www.w3schools.com/css/default.asp" title="Página WEB de CSS" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-css3-alt"></i></a>
                        <a href="https://www.w3schools.com/js/default.asp" title="Página WEB de JAVASCRIPT" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-js"></i></a>
                        <a href="https://getbootstrap.com/" title="Página WEB de BOOTSTRAP" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-bootstrap"></i></a>
                        <a href="https://fontawesome.com/" title="Página WEB de FONTAWESOME" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-font-awesome"></i></a>
                        <a href="https://datatables.net/" title="Página WEB de DATATABLE" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-table"></i></a>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
