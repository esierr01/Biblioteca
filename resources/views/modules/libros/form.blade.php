@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('menu_seleccionado')
    @include('modules.partials.nav-bloqueado')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f0926b9a9.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <script src="{{ asset('libs/js/main-interface.js') }}"></script>
@endsection

@section('content')
    <div class="container contenedor-index">
        <form @yield('accion') method="POST" enctype="multipart/form-data">
            @yield('metodo')
            @csrf

            <div class="card">
                <div class="card-header">
                    <div class="row col-12">
                        <div class="col-6 mt-1"><span class="titulo-index">@yield('titulo-index')</span></div>
                        <div class="col-6 d-flex justify-content-end">
                            <button type="submit" class="btn btn-blue mx-1">Guardar Datos</button>
                            <a class="btn btn-red mx-1" href="{{ route('libros.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-7 mt-2">

                            <div class="input-group mt-3 mb-3 mx-2">
                                <span class="input-group-text" id="basic-addon1">Título</span>
                                <input type="text" name="titulo" class="form-control" placeholder=".. Ingrese título del Libro" aria-label="titulo" aria-describedby="basic-addon1" @isset($libro) value="{{ $libro->titulo }}" @else value="{{ old('titulo') }}" @endisset>
                            </div> 
                            <div class="input-group mt-3 mb-3 mx-2">
                                <span class="input-group-text" id="basic-addon1">Autor</span>
                                <input type="text" name="autor" class="form-control" placeholder=".. Ingrese autor del Libro" aria-label="autor" aria-describedby="basic-addon1" @isset($libro) value="{{ $libro->autor }}" @else value="{{ old('autor') }}" @endisset>
                            </div> 
                                                       

                           
                            
                        </div>

                        <div class="col-1"></div>

                        <div class="card col-4 mt-2">
                            Columna de 5
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
