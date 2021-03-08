 {{--   @extends('layouts.master')

<main>

    @section('master')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-dark">
                    @auth
                    Bienvenido {{Auth::user()->name}} {{Auth::user()->role_id}}
@else
Primex
@endauth
</h1>
<p class="lead text-muted">Something short and leading about the collection below—its contents, the
    creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
    entirely.</p>
{{--  @if(Auth::user()->hasRole('admin'))
                <div>Acces com administrador</div>
                @else
                <div>Acces usuari</div>
                @endif  
                You are logged in!
                <p>

                    {{--  Bienvenido {{ auth()-> user()->name}}


@auth
@else
<a href="{{ route('login') }}" class="btn btn-primary my-2">Iniciar sesion</a>

@if (Route::has('register'))
<a href="{{ route('register') }}" class="btn btn-secondary my-2">Registrarse</a>
@endif
@endauth

</p>
</div>
</div>
</section>

@parent

@stop
</main> --}}



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/jpg" href="{{asset('storage/img/favicon.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Primex</title>


    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>

    <style>
        :root {
            --main-white-color: white;
            --main-black-color: black;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .header .navbar {
            background-color: transparent !important;
        }

        .static {
            position: static;
        }

        section {
            display: none;
        }

        .cover {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .owl-carousel .owl-slide {
            position: relative;
            height: 94vh;
            background-color: lightgray;
        }

        .owl-carousel .owl-slide-animated {
            transform: translateX(20px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.05s;
        }

        .owl-carousel .owl-slide-animated.is-transitioned {
            transform: none;
            opacity: 1;
            visibility: visible;
            transition: all 0.5s;
        }

        .owl-carousel .owl-slide-title.is-transitioned {
            transition-delay: 0.2s;
        }

        .owl-carousel .owl-slide-subtitle.is-transitioned {
            transition-delay: 0.35s;
        }

        .owl-carousel .owl-slide-cta.is-transitioned {
            transition-delay: 0.5s;
        }

        .owl-carousel .owl-dots,
        .owl-carousel .owl-nav {
            position: absolute;
        }

        .owl-carousel .owl-dots .owl-dot,
        .owl-carousel .owl-nav [class*="owl-"]:focus {
            outline: none;
        }

        .owl-carousel .owl-dots .owl-dot span {
            background: transparent;
            border: 1px solid var(--main-black-color);
            transition: all 0.2s ease;
        }

        .owl-carousel .owl-dots .owl-dot:hover span,
        .owl-carousel .owl-dots .owl-dot.active span {
            background: var(--main-black-color);
        }

        .owl-carousel .owl-nav {
            left: 50%;
            top: 80%;
            transform: translateX(-50%);
            margin: 0;
        }

        .owl-carousel .owl-nav svg {
            opacity: 0.8;
            transition: opacity 2s;
        }

        .owl-carousel .owl-nav button:hover svg {
            opacity: 1;
        }

        .owl-carousel .owl-nav [class*="owl-"]:hover {
            background: transparent;
        }


        @media screen and (max-width: 575px) {
            .owl-carousel .owl-nav {
                top: 5%;
            }

            .owl-carousel .owl-nav svg {
                width: 24px;
                height: 24px;
            }
        }

    </style>

    <script>
        window.console = window.console || function (t) {};

    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }

    </script>


</head> 
<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark " style="background-color: black  !important;">
            <div class="container">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img src="{{asset('storage/img/favicon.png')}}" alt="logo" width="6%">
                    <strong> Primex @yield('title')</strong>
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
                                <a href="{{route('videos.index')}}" class="dropdown-item "> Video</a>
                                @if(Auth::user()->hasRole('admin'))
                                <a href="{{route('admin.index')}}" class="dropdown-item"> Admin</a>
                            @else
                            @endif 
                            <a href="{{route('users.index', Auth::user()->id)}}" class="dropdown-item"> Usuario</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </div>
                        </li>
                    </ul>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Iniciar sesion</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Registrarse</a>
                    @endif
                    @endauth
                </div>
            </div>
        </nav>
    </header>  
    <div class="owl-carousel owl-theme">
        <div class="owl-slide d-flex align-items-center cover"
            style="background-image: url({{asset('storage/img/portada/spiderman-1.jpg')}});">
            <div class="container">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-10 col-md-6 static">
                        <div class="owl-slide-text" style="color:white;">
                            <h2 class="owl-slide-animated owl-slide-title" >
                                @auth
                                {{--  Bienvenido {{Auth::user()->name}} {{Auth::user()->role_id}} --}}
                                Spider-Man
                                @else
                                Spider-Man en Primex
                                @endauth
                            </h2>
                            <div class="owl-slide-animated owl-slide-subtitle mb-3">
                                Luego de sufrir la picadura de una araña genéticamente modificada, un estudiante de
                                secundaria tímido y torpe adquiere increíbles capacidades como arácnido. Pronto
                                comprenderá que su misión es utilizarlas para luchar contra el mal y defender a sus
                                vecinos.
                            </div>
                            @auth
                            <a href="{{ route('videos.index') }}" class="btn btn-info my-2">Ver ahora</a>
                            <a href="{{ route('videos.index') }}" class="btn btn-dark my-2">Ver mas</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary my-2">Iniciar sesion</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-dark my-2">Registrarse</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->

        <div class="owl-slide d-flex align-items-center cover"
            style="background-image: url({{asset('storage/img/portada/Megalodón.jpg')}});">
            <div class="container">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-10 col-md-6 static">
                        <div class="owl-slide-text" style="color:white;">
                            <h2 class="owl-slide-animated owl-slide-title">
                                @auth
                                {{--  Bienvenido {{Auth::user()->name}} {{Auth::user()->role_id}} --}}
                                Megalodon
                                @else
                                Megalodon en Primex
                                @endauth
                            </h2>
                            <div class="owl-slide-animated owl-slide-subtitle mb-3">
                                Un tiburón prehistórico de 25 metros de longitud amenaza a los tripulantes de un
                                submarino hundido en la fosa más profunda del océano Pacífico y al grupo enviado para
                                rescatarlos. Si no lo detienen, el tiburón causará estragos.
                            </div>
                            @auth
                            <a href="{{ route('videos.index') }}" class="btn btn-info my-2">Ver ahora</a>
                            <a href="{{ route('videos.index') }}" class="btn btn-dark my-2">Ver mas</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary my-2">Iniciar sesion</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-dark my-2">Registrarse</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->

        <div class="owl-slide d-flex align-items-center cover"
            style="background-image: url({{asset('storage/img/portada/Fast&Furious.jpg')}});">
            <div class="container">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-10 col-md-6 static">
                        <div class="owl-slide-text" style="color:white;">
                            <h2 class="owl-slide-animated owl-slide-title">
                                @auth
                                {{--  Bienvenido {{Auth::user()->name}} {{Auth::user()->role_id}} --}}
                                The Fast and the Furious
                                @else
                                The Fast and the Furious en Primex
                                @endauth
                            </h2>
                            <div class="owl-slide-animated owl-slide-subtitle mb-3">
                                The Fast and the Furious es una franquicia de medios estadounidense centrada en una serie de películas de acción que se ocupan en gran medida de carreras callejeras. La saga también incluye cortometrajes, una serie de televisión, espectáculos en vivo, videojuegos y atracciones de parques temáticos.
                            </div>
                            @auth
                            <a href="{{ route('videos.index') }}" class="btn btn-info my-2">Ver ahora</a>
                            <a href="{{ route('videos.index') }}" class="btn btn-dark my-2">Ver mas</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary my-2">Iniciar sesion</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-dark my-2">Registrarse</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
    </div>
    <script type="text/javascript" src="{{asset('js/app.js') }}"></script>  
    <script
        src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js">
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>  
    <script>
        /*JS way for setting height: 100vh to slides' height*/
        /*const $slides = $(".owl-carousel .owl-slide");
        $slides.css("height", $(window).height());
        $(window).resize(() => {
          $slides.css("height", $(window).height());
        });*/

        $(".owl-carousel").on("initialized.owl.carousel", () => {
            setTimeout(() => {
                $(".owl-item.active .owl-slide-animated").addClass("is-transitioned");
                $($owlCarousel).trigger("refresh.owl.carousel");
                $("section").show();
            }, 200);
        });



        const $owlCarousel = $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            navText: [
                '<svg width="50" height="50" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>',
                '<svg width="50" height="50" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>' /* icons from https://iconmonstr.com */
            ]
        });



        $owlCarousel.on("changed.owl.carousel", e => {
            $(".owl-slide-animated").removeClass("is-transitioned");

            const $currentOwlItem = $(".owl-item").eq(e.item.index);
            $currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");

            const $target = $currentOwlItem.find(".owl-slide-text");
            doDotsCalculations($target);
        });

        $owlCarousel.on("resize.owl.carousel", () => {
            setTimeout(() => {
                setOwlDotsPosition();
            }, 50);
        });

        /*if there isn't content underneath the carousel*/
        //$owlCarousel.trigger("refresh.owl.carousel");

        setOwlDotsPosition();

        function setOwlDotsPosition() {
            const $target = $(".owl-item.active .owl-slide-text");
            doDotsCalculations($target);
        }

        function doDotsCalculations(el) {
            const height = el.height();
            const {
                top,
                left
            } = el.position();
            const res = height + top + 20;

            $(".owl-carousel .owl-dots").css({
                top: `${res}px`,
                left: `${left}px`
            });

        }
        //# sourceURL=pen.js

    </script>

</body>

</html>