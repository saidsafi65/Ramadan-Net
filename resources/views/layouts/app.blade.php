<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'رمضـــان نـــت') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ URL('loginRs/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('loginRs/fontawesome/css/all.css') }}">

    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ URL('loginRs/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL('loginRs/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL('loginRs/js/bootstrap_show_password.min.js') }}"></script>

    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ URL('loginRs/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ URL('loginRs/js/main.js') }}"></script>
</head>

<body>
    <div class="limiter" id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm" style="background: linear-gradient(to right, #878bf0, #ffffff,#d189d5);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'رمضـــان نـــت') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <main class="py-4"> -->
        <div class="container-login100">
            @include('partial.flash')
            @yield('content')
        </div>
        <!-- </main> -->
    </div>
</body>

</html>