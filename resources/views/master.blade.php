<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Título de la página</title>



</head>

<body style="padding: 10px 25px 30px 60px;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if (auth()->user()->perfil_id == 1 || auth()->user()->perfil_id == 2)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                    @endif
                    @if (auth()->user()->perfil_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empresas.index') }}">Listar Empresas</a>
                        </li>
                    @endif
                    @if (auth()->user()->perfil_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empresas.create') }}">Agregar Empresa</a>
                        </li>
                    @endif
                    @if (auth()->user()->perfil_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('peliculas.index') }}">Listar Peliculas</a>
                        </li>
                    @endif
                    @if (auth()->user()->perfil_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('peliculas.create') }}">Agregar Pelicula</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
