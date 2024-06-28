<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('libs/img/libreria.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        {{-- data-bs-theme="dark" --}}
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('libs/img/uneti.png') }}" alt="logo uneti">
                <span>@yield('title')</span>
            </a>
            <button class="navbar-toggler toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('interface.index') }}">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('interface.acerca') }}">Acerca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('interface.contacto') }}">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gestión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/5f0926b9a9.js" crossorigin="anonymous"></script>
</body>

</html>
