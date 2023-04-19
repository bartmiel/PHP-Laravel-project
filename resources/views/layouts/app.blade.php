<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100" style="font-family: 'Roboto', sans-serif;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 px-3 justify-content-between">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/img/logo.png" width="35" height="35" class="d-inline-block ms-2 me-2 align-bottom">
                {{ config('app.name', 'ProjektPHP') }}
            </a>

            <div class="collapse navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @auth
                    <li class="nav-item border-end border-start">
                        <a class="nav-link active mt-2" aria-current="Main page" href="{{ route('competition.home') }}">{{ __('Competitions') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-2" aria-current="Main page" href="{{ route('result.home') }}">{{__('Results  ')}}</a>
                    </li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else

                    <li class="nav-item text-white mt-2 me-3">
                        {{ Auth::user()->email }}
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning px-4" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            <i class="bi bi-door-open-fill me-2"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main class="min-vh-100 container">
        <div>
            @yield('content')
        </div>
    </main>

    <footer class="py-3 bg-dark text-light mt-auto">
        <p class="text-center text-muted">© 2022 Bartłomiej Mielniczek</p>
    </footer>
    @yield('scripts')
</body>
</html>
