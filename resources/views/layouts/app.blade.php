<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body><div id="app">
        <header id="main-header">
                <div class="container flex-container">
                    <div class="left-main-header">
                        <ul>
                            <li><a class="home-link" href="{{ url('/') }}">Home</a></li>
                        </ul>
                    </div>
                    <div class="right-main-header">
                        <form action="search.html" method="GET" class="search-form">
                            <input class="search-input" type="text" placeholder="Search" name="search">
                        </form>
                        <ul>
                            <li><a href="registration.html">Register</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li class="dropdown-li" onClick="toggleUserDropdown();"><span class="user-image"><img  src="images/profile_default2.png"></span><span>Username</span><i id="dropdown-icon" class="fa fa-caret-down"></i>
                                <ul id="user-dropdown-ul">
                                    <li><a href="profile.html">Profile</a></li>
                                    <!-- <li><a href="">Gallery</a></li>
                                    <li><a href="">Settings</a></li> -->
                                    <li><a href="logout">Sign Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
    
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <form action="/search" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                    placeholder="Search users"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
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



                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                </a>
                                @role('Admin')
                                <a class="dropdown-item" href="{{ route('admin.category.index') }}">
                                    {{ __('Categories') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                    {{ __('Users') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.roles.index') }}">
                                    {{ __('Roles') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.permissions.index') }}">
                                    {{ __('Permissions') }}
                                </a>

                                @endrole

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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="conteiner">
                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
