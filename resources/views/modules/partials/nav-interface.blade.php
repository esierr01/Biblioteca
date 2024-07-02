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
                    <a class="nav-link" href="{{ route('interface.index') }}">LIBROS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('interface.acerca') }}">ACERCA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('interface.contacto') }}">CONTACTO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">GESTION</a>
                </li>
            </ul>
        </div>
    </div>
</nav>