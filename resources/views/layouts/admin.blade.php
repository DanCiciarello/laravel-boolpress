<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/backend.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @auth
        <nav class="navbar navbar-dark sticky-top flex-md-nowrap px-2 py-1 navbar-expand cdNavbarAdmin">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                <img src="{{asset("img/logo-boolpress.png")}}" alt="Logo" height="25">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Ciao, {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    <!-- Authentication Links -->
                    {{-- @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endguest --}}
                </ul>
            </div>
        </nav>
        @endauth

        @auth
        <div class="row cdRow">
            <div class="col-md-2 d-none d-md-block sidebar py-4 cdSidebar px-0">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link py-1" href="{{route("admin.homepage")}}">
                                <div class="cdNavLink d-flex align-items-center {{ Request::route()->getName() === 'admin.homepage' ? 'cdActive' : '' }}">
                                    <div class="cdNavIcon">
                                        <i class="fa-brands fa-think-peaks"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span>Homepage</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-1" href="{{route("admin.posts.index")}}">
                                <div class="cdNavLink d-flex align-items-center {{ Request::route()->getName() === 'admin.posts.index' ? 'cdActive' : '' }}">
                                    <div class="cdNavIcon">
                                        <i class="fa-brands fa-gitter"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span>Posts</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-1" href="{{route("admin.users.index")}}">
                                <div class="cdNavLink d-flex align-items-center {{ Request::route()->getName() === 'admin.users.index' ? 'cdActive' : '' }}">
                                    <div class="cdNavIcon">
                                        <i class="fa-solid fa-users-rays"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span>Users</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="cdMainAdmin col-md-9 ml-sm-auto col-lg-10 pt-3 py-5">
                @yield('content')
            </main>
        </div>
        @endauth

        @guest
        <main>
            @yield('content')
        </main>
        @endguest

    </div>
</body>

</html>
