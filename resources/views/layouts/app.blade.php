<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

<body>
    <div id="app">
        <header id="main-header">
            <div class="container flex-container">
                <div class="left-main-header">
                    <ul>
                        <li><a class="home-link" href="{{ url('/') }}">Home</a></li>
                    </ul>
                </div>
                <div class="right-main-header">
                    <form action="{{route('search')}}" method="GET" class="search-form">
                        {{ csrf_field() }}
                        <input class="search-input" type="text" placeholder="Search" name="q">
                    </form>
                    <ul>
                        @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                        @else
                        <li class="dropdown-li" onClick="toggleUserDropdown();"><span class="user-image"><img
                                    src="images/profile_default2.png"></span><span>{{ Auth::user()->name }}</span><i id="dropdown-icon"
                                class="fa fa-caret-down"></i>
                            <ul id="user-dropdown-ul">
                                <li><a href="{{ route('profile') }}">Profile</a></li>
                                @role('Admin')
                                <li><a class="dropdown-item" href="{{ route('admin.category.index') }}">
                                        {{ __('Categories') }}
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        {{ __('Users') }}
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.roles.index') }}">
                                        {{ __('Roles') }}
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.permissions.index') }}">
                                        {{ __('Permissions') }}
                                    </a></li>

                                @endrole
                                <!-- <li><a href="">Gallery</a></li>
                                        <li><a href="">Settings</a></li> -->
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </header>



        @yield('content')
    </div>
</body>

</html>
