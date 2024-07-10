@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('titulo-modulo', 'Acerca')

@section('menu_seleccionado')
    @include('modules.partials.nav-interface')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-interface.css') }}">
@endsection

@section('content')
    <div class="container contenedor-acerca">
        <div class="card">
            <div class="card-body">
                <p class="texto-acerca col-10 offset-1"> 
                    Bienvenido al Sitio WEB <span class="text-success">Biblioteca</span>, desarrollo realizado por <span class="text-success">Emmanuel Sierra Pacheco</span> estudiante de la Universidad Nacional Experimental de Las Telecomunicaciones e Informática - UNETI, Cuarto semestre, Carrera de Ingeniería en Informática, Unidad Curricular Programación II, módulo 2.<br><br>

                    El desarrollo se realizó utilizando <span class="text-success">PHP con Laravel</span> para el backend, aprovechando su potencia y flexibilidad, para manejar la lógica de negocio y la interacción con <span class="text-success">MySQL</span>, elegida como sistema de gestión de bases de datos. Para la presentación y diseño, se adoptó <span class="text-success">Bootstrap</span>, un framework que facilita la creación de interfaces responsivas y atractivas, junto con <span class="text-success">FontAwesome</span> para añadir iconos que mejoran la experiencia del usuario y <span class="text-success">DataTable</span> que es una biblioteca para añadir controles de interacción avanzados a las tablas HTML. <br><br>
                            
                    El frontend está construido con <span class="text-success">HTML</span>, <span class="text-success">CSS</span> y <span class="text-success">JavaScript</span>, combinando estos lenguajes para ofrecer una navegación fluida y una estética agradable, independientemente del dispositivo utilizado para acceder al sitio. Este proyecto es un testimonio del esfuerzo que realice, aplicando mis conocimientos y habilidades teóricos en un proyecto práctico, superando desafíos y alcanzando resultados significativos.
                </p>
            </div>
        </div>
        
    </div>
@endsection