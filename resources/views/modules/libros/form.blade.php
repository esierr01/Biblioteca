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
                                <label class="input-group-text" for="inputGroupSelect01">Publicación (Año):</label>
                                <select name="ano_publica" class="form-select" id="inputGroupSelect01">
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
                                <label class="input-group-text" for="inputGroupSelect01">Edición (Número):</label>
                                <select name="edicion" class="form-select" id="inputGroupSelect01">
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
                                <label class="input-group-text" for="inputGroupSelect01">Ejemplares del Libro
                                    (Existentes):</label>
                                <select id="ejemplares" name="ejemplares" class="form-select" id="inputGroupSelect01">
                                    @for ($ejemp = 1; $ejemp < 21; $ejemp++)
                                        @isset($libro)
                                            @if ($ejemp == intval($libro->ejemplares))
                                                <option selected value="{{ $ejemp }}">{{ $ejemp }}</option>
                                            @else
                                                <option value="{{ $ejemp }}">{{ $ejemp }}</option>
                                            @endif
                                        @else
                                            @if (old('ejemplares') == '')
                                                @if ($ejemp == 1)
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
                                        @endisset
                                    @endfor
                                </select>
                            </div>

                            <div class="input-group mt-3">
                                <label class="input-group-text" for="inputGroupSelect01">Ejemplares del Libro
                                    (Disponibles):</label>
                                <select id="disponibles" name="disponibles" class="form-select" id="inputGroupSelect01">
                                    <option selected>Seleccione...</option>
                                    @for ($dispon = 1; $dispon < 21; $dispon++)
                                        @isset($libro)
                                            @if ($dispon == intval($libro->disponibles))
                                                <option selected value="{{ $dispon }}">{{ $dispon }}</option>
                                            @else
                                                <option value="{{ $dispon }}">{{ $dispon }}</option>
                                            @endif
                                        @else
                                            @if (old('disponibles') == '')
                                                @if ($dispon == 1)
                                                    <option selected value="{{ $dispon }}">{{ $dispon }}</option>
                                                @else
                                                    <option value="{{ $dispon }}">{{ $dispon }}</option>
                                                @endif
                                            @else
                                                @if ($dispon == old('disponibles'))
                                                    <option selected value="{{ $dispon }}">{{ $dispon }}</option>
                                                @else
                                                    <option value="{{ $dispon }}">{{ $dispon }}</option>
                                                @endif
                                            @endif
                                        @endisset
                                    @endfor
                                </select>
                            </div>
                            <span id="errorDisponible"></span>

                            {{-- * Se coloca el campo estatus por defecto en 0 cuando se carga registro --}}
                            <input type="text" name="estatus" value="0" hidden>

                        </div>

                        <div class="col-1"></div>

                        <div class="col-4 mt-2 text-center">
                            <div class="d-flex justify-content-center">
                                @isset($libro)
                                    <img class="imagen-libro" id="ImagenLibro" src="{{ asset('storage') . '/' . $libro->caratula }}"
                                alt="carátula del libro" />
                                @else
                                    <img class="imagen-libro" id="ImagenLibro" src="/libs/img/no_disponible.png"
                                alt="carátula del libro" />
                                @endisset
                                
                            </div>

                            <div class="mt-2">
                                <label for="formFileSm" class="form-label">Carátula: </label>
                                <input name="caratula" class="form-control form-control-sm" id="formFileSm"
                                    type="file" accept=".jpg, .jpeg, .png, image/*" value=""
                                    onchange="mostrarImagen(event)" @isset($libro) value="{{ $libro->titulo }}" @endisset>

                                    
                                {{-- @error('caratula')
                                    <small class="text-danger mt-0 mb-1">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @else
                                    <div class="mb-3"></div>
                                @enderror --}}
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
