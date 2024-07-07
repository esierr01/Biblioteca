@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('menu_seleccionado')
    @include('modules.partials.nav-bloqueado')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="{{ asset('libs/js/main-form_lib.js') }}"></script>
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
                            <button id="enviarBtn" type="submit" class="btn btn-blue mx-1">Guardar Datos</button>
                            <a class="btn btn-red mx-1" href="{{ route('libros.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-7 mt-2 text-center">

                            <div class="input-group mt-1 mx-2">
                                <span class="input-group-text" id="basic-addon1">Título</span>
                                <input type="text" id="titulo" name="titulo" class="form-control"
                                    placeholder=".. Ingrese título del Libro" aria-label="titulo"
                                    aria-describedby="basic-addon1"
                                    @isset($libro) value="{{ $libro->titulo }}" @else value="{{ old('titulo') }}" @endisset>

                            </div>
                            <span id="errorTitulo"></span>

                            <div class="input-group mx-2 mt-3">
                                <span class="input-group-text" id="basic-addon1">Autor</span>
                                <input type="text" id="autor" name="autor" class="form-control"
                                    placeholder=".. Ingrese autor del Libro" aria-label="autor"
                                    aria-describedby="basic-addon1"
                                    @isset($libro) value="{{ $libro->autor }}" @else value="{{ old('autor') }}" @endisset>
                            </div>
                            <span id="errorAutor"></span>

                            <div class="input-group mt-3">
                                <label class="input-group-text" for="ano_publica">Publicación (Año):</label>
                                <select name="ano_publica" class="form-select" id="ano_publica">
                                    @for ($ano = 1900; $ano < 2090; $ano++)
                                        @isset($libro)
                                            @if ($ano == intval($libro->ano_publica))
                                                <option selected value="{{ $ano }}">{{ $ano }}</option>
                                            @else
                                                <option value="{{ $ano }}">{{ $ano }}</option>
                                            @endif
                                        @else
                                            @if (old('ano_publica') == '')
                                                @if ($ano == 2024)
                                                    <option selected value="{{ $ano }}">{{ $ano }}</option>
                                                @else
                                                    <option value="{{ $ano }}">{{ $ano }}</option>
                                                @endif
                                            @else
                                                @if ($ano == old('ano_publica'))
                                                    <option selected value="{{ $ano }}">{{ $ano }}</option>
                                                @else
                                                    <option value="{{ $ano }}">{{ $ano }}</option>
                                                @endif
                                            @endif
                                        @endisset
                                    @endfor
                                </select>
                            </div>

                            <div class="input-group mt-3">
                                <label class="input-group-text" for="edicion">Edición (Número):</label>
                                <select name="edicion" class="form-select" id="edicion">
                                    @for ($edi = 1; $edi < 11; $edi++)
                                        @isset($libro)
                                            @if ($edi == intval($libro->edicion))
                                                <option selected value="{{ $edi }}">{{ $edi }}</option>
                                            @else
                                                <option value="{{ $edi }}">{{ $edi }}</option>
                                            @endif
                                        @else
                                            @if (old('edicion') == '')
                                                @if ($edi == 1)
                                                    <option selected value="{{ $edi }}">{{ $edi }}</option>
                                                @else
                                                    <option value="{{ $edi }}">{{ $edi }}</option>
                                                @endif
                                            @else
                                                @if ($edi == old('edicion'))
                                                    <option selected value="{{ $edi }}">{{ $edi }}</option>
                                                @else
                                                    <option value="{{ $edi }}">{{ $edi }}</option>
                                                @endif
                                            @endif
                                        @endisset
                                    @endfor
                                </select>
                            </div>

                            <div class="input-group mt-3">
                                <label class="input-group-text" for="ejemplares">Ejemplares del Libro (Existentes):</label>
                                @isset($libro)
                                    <select id="ejemplares" name="ejemplares" class="form-select" disabled>
                                        @for ($ejemp = 0; $ejemp < 21; $ejemp++)
                                            @if ($ejemp == intval($libro->ejemplares))
                                                <option selected value="{{ $ejemp }}">{{ $ejemp }}</option>
                                            @else
                                                <option value="{{ $ejemp }}">{{ $ejemp }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                @else
                                    <select id="ejemplares" name="ejemplares" class="form-select">
                                        @for ($ejemp = 0; $ejemp < 21; $ejemp++)
                                            @if (old('ejemplares') == '')
                                                @if ($ejemp == 0)
                                                    <option selected value="{{ $ejemp }}">{{ $ejemp }}</option>
                                                @else
                                                    <option value="{{ $ejemp }}">{{ $ejemp }}</option>
                                                @endif
                                            @else
                                                @if ($ejemp == old('ejemplares'))
                                                    <option selected value="{{ $ejemp }}">{{ $ejemp }}</option>
                                                @else
                                                    <option value="{{ $ejemp }}">{{ $ejemp }}</option>
                                                @endif
                                            @endif
                                        @endfor
                                    </select>
                                @endisset
                            </div>
                            <span id="errorEjemplares"></span>

                            <div class="input-group mt-3">
                                <label class="input-group-text" for="disponibles">Ejemplares del Libro (Disponibles):</label>
                                @isset($libro)
                                    <select id="disponibles" name="disponibles" class="form-select" disabled>
                                        <option selected value="{{ $libro->disponibles }}">{{ $libro->disponibles }}</option>
                                    </select>
                                @else
                                    <select id="disponibles" name="disponibles" class="form-select" disabled>
                                        <option selected value="0">0</option>
                                    </select>
                                @endisset
                            </div>

                            {{-- * Se coloca el campo estatus por defecto en 0 cuando se carga registro --}}
                            <input type="text" name="estatus" value="0" hidden>

                        </div>

                        <div class="col-1"></div>

                        <div class="col-4 mt-2 text-center">
                            <div class="d-flex justify-content-center">
                                @isset($libro)
                                    <img class="imagen-libro" id="ImagenLibro"
                                        src="{{ asset('storage') . '/' . $libro->caratula }}" alt="carátula del libro" />
                                @else
                                    <img class="imagen-libro" id="ImagenLibro" src="/libs/img/no_disponible.png"
                                        alt="carátula del libro" />
                                @endisset

                            </div>

                            <div class="mt-2">
                                <label for="caratula" class="form-label">Carátula: </label>
                                <input name="caratula" class="form-control form-control-sm" id="caratula"
                                    type="file" accept=".jpg, .jpeg, .png, image/*" value=""
                                    onchange="mostrarImagen(event)">
                                <span id="errorCaratula"></span>
                            </div>
                        </div>
                    </div>
                </div>
        </form>


    </div>


@endsection
