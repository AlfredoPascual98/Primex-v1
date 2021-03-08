<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Primex</title>
    {{--  <link rel="stylesheet" href="/css/bootstrap.min.css">  --}}
    <link rel="shortcut icon" type="image/jpg" href="{{asset('storage/img/favicon.png')}}"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <header>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: black !important;">

            <div class="container">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img src="{{asset('storage/img/favicon.png')}}" alt="logo" width="6%">
               </svg>
                    <strong>  Primex @yield('title')</strong>
                </a>


                <div id="navbarNavDropdown">
                    @auth
                    <ul class="navbar-nav flex-row">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{route('videos.index')}}" class="dropdown-item"> Video</a>
                                <a href="javascript: document.getElementById('logout').submit()"
                                    class=" dropdown-item">Cerrar
                                    sesion</a>
                                <form action="{{ route('logout')}} " id="logout" style="display:none" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary my-2">Iniciar sesion</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary my-2">Registrarse</a>
                    @endif
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="my-4">
        @section('main')
        @yield('contenido')
        @show
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                    href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>


    <script type="text/javascript" src="{{asset('js/app.js') }}"></script>


</body>

</html>
