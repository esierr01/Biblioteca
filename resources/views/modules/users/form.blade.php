@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('menu_seleccionado')
    @include('modules.partials.nav-bloqueado')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="{{ asset('libs/js/main-form_use.js') }}"></script>
@endsection

@section('content')
    <div class="container contenedor-index">
        <form @yield('accion') method="POST">
            @yield('metodo')
            @csrf

            <div class="card">
                <div class="card-header">
                    <div class="row col-12">
                        <div class="col-6 mt-1"><span class="titulo-index">@yield('titulo-index')</span></div>
                        <div class="col-6 d-flex justify-content-end">
                            <button id="enviarBtn" type="submit" class="btn btn-blue mx-1">Guardar Datos</button>
                            <a class="btn btn-red mx-1" href="{{ route('users.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-8 offset-2 mt-2 text-center">

                            <div class="input-group mt-2 mx-2">
                                <span class="input-group-text" id="basic-addon1">Nombre completo</span>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder=".. Ingrese nombre completo del Usuario (ADMIN)" aria-label="name"
                                    aria-describedby="basic-addon1" value="{{ old('name') }}">
                            </div>
                            <span id="errorName"></span>

                            <div class="input-group mx-2 mt-4">
                                <span class="input-group-text" id="basic-addon1">Correo</span>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder=".. Ingrese correo del Usuario" aria-label="email"
                                    aria-describedby="basic-addon1"
                                    value="{{ old('email') }}">
                            </div>
                            <span id="errorEmail"></span>

                            <div class="input-group mt-4 mx-2">
                                <span class="input-group-text" id="basic-addon1">Clave</span>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder=".. Ingrese clave de acceso (min 8 digitos)" aria-label="password"
                                    aria-describedby="basic-addon1"
                                    value="">
                                <button class="btn btn-outline-secondary" type="button" id="boton-ojo"><i class="fa-regular fa-eye"></i></button>
                                
                            </div>
                            <span id="errorPassword"></span>

                            


                        </div>

                    </div>
                </div>
        </form>
    </div>
@endsection
