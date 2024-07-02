@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('titulo-modulo', 'Login')

@section('menu_seleccionado')
    @include('modules.partials.nav-bloqueado')
@endsection

@section('opcional')
    
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
    <div class="container contenedor-login">
        <form action="{{ route('interface.valida_login') }}" method="post">
            @csrf

            @error('invalid_credentials')
                <div class="col-6 offset-3 alert alert-danger alert-dismissible fade show mt-3" role="alert" id="alerta">
                    <strong>Error!</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            <div class="card col-6 offset-3">
                <div class="card-header text-center">
                    Acceso a la Gestión del Sistema
                </div>

                <div class="card-body">
                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping">Usuario</span>
                        <input type="text" class="form-control" placeholder="Ingrese e-mail" value="{{ old('email') }}"
                            name="email" aria-label="Usuario" aria-describedby="addon-wrapping">
                    </div>
                    @error('email')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror

                    <div class="input-group flex-nowrap mt-4 mb-4">
                        <span class="input-group-text" id="addon-wrapping">Contraseña</span>
                        <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password"
                            aria-label="Password" aria-describedby="addon-wrapping">
                    </div>
                    @error('password')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror

                    <div class="d-flex justify-content-center align-items-center full-height">
                        <button type="submit" class="btn btn-blue mx-1">Ingresar</button>
                        <a href="{{ route('interface.index') }}" class="btn btn-orange mx-1">Regresar</a>
                    </div>
                </div>
        </form>
    </div>
@endsection
