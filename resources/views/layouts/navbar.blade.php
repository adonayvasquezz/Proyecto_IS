<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   {{--  <link rel="stylesheet" href="../Styles/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/estilo-navbar.css">
    <link rel="stylesheet" href="../Styles/fontawesome-all.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('Styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Styles/estilo-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Styles/fontawesome-all.min.css') }}">

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navP" id="barra-nav">
            <a class="navbar-brand" href="/home"><img class="img-n" src="../Images/logo.png" alt=""> <span class="t-logo">e-Transs</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto nav-n">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/rutas">Rutas</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="/viajes">Viajes</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="/ventas">Ventas</a>
                    </li>

                    @if(@Auth::user()->hasRole('empleado'))
                    <li class="nav-item active">
                        <a class="nav-link" href="/administracion">Administracion</a>
                    </li>
                    @endif

                    <li class="nav-item active">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i  class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div style="background:#2C2E3D" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/perfil">
                                Perfil
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest

                    {{-- <li class="nav-item active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i  class="fas fa-user"></i></span>
                        </a>
                        <div style="background:#2C2E3D" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><span> <i  class="fas fa-user"></i> Hola Usuario</span> </a>
                            <div class="dropdown-divider"></div>

                            <!-- <a class="dropdown-item" href="#">Usuario</a> -->
                            <a class="dropdown-item" href="#">Modificar perfil</a>
                            <a class="dropdown-item" href="#">Cerrar Sesion </a>
                        </div>
                    </li> --}}

                </ul>

            </div>
        </nav>
    </div>


<div class="container">
    <br>
    @yield('content')
    <br>
</div>



    <div id="footer" class="inferior">
        <ul class="icons">
            <li>
                <a href="#" class="icon brands fa-twitter"></a>
            </li>
            <li>
                <a href="#" class="icon brands fa-facebook-f"></a>
            </li>
            <li>
                <a href="#" class="icon brands fa-instagram"></a>
            </li>
            <li>
                <a href="#" class="icon brands fa-github"></a>
            </li>
            <li>
                <a href="#" class="icon brands fa-dribbble"></a>
            </li>
        </ul>

        <ul class="copyright">
            <li>&copy; E-Transs. Todos los derechos reservados.</li>
        </ul>
    </div>



    <script src="{{ asset('Controladores/jquery.min.js')}}"></script>
    <script src="{{ asset('Controladores/bootstrap.min.js') }}"></script>


</body>

</html>
