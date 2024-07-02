<!DOCTYPE html>
<html lang="es"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('libs/img/libreria.ico') }}" type="image/x-icon">

    {{--* Estilos CSS --}}
    @yield('css')

</head>

<body>
    @yield('menu_seleccionado')

    <div class="container mt-3 mb-2 contenedor-titulo">
        @yield('titulo-modulo')
    </div>

    @yield('content')

    <footer>
        <hr>
        <p>Copyright © Biblioteca 2024 - Desarrolado por Emmanuel Sierra</p>
    </footer>

    {{--* Scripts del Sistema --}}
    @yield('js')
    
    
    @yield('script-final')
</body>

</html>
