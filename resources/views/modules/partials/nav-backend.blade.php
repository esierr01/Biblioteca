<nav class="navbar navbar-expand-lg navbar-custom">
    {{-- data-bs-theme="dark" --}}
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index_menu') }}">
            <img src="{{ asset('libs/img/uneti.png') }}" alt="logo uneti">
            <span>@yield('title')</span>
        </a>
        <button class="navbar-toggler toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        LIBROS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('libros.index') }}">ACTIVOS</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">ELIMINADOS</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        CLIENTES
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ACTIVOS</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">ELIMINADOS</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        PRESTAMOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ACTIVOS</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">CERRADOS</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        SISTEMA
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">GESTION USUARIOS</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('signout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">CERRAR SESION</a>
                            <form id="logout-form" action="{{ route('signout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </li>

{{-- 



                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">CERRAR
                        SESION</a>
                    <form id="logout-form" action="{{ route('signout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
