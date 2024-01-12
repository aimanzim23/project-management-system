<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project Management System</title>

    <style>
        .navbar-nav {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .nav-link {
            display: block;
            padding: 15px 20px;
            font-size: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .nav-link:hover {
            background-color: rgba(0, 0, 0, 1);
        }
    </style>


    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Include Font Awesome CSS (you can adjust the version based on your preference) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            @if(Gate::allows('isManager')||Gate::allows('isBusinessUnit')||Gate::allows('isDeveloper'))
                <i class="fas fa-bars fa-md text-secondary offcanvas-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i>
            @endif
            <a class="navbar-brand mx-lg-3" href="{{ url('/') }}" style="font-family: 'Raleway', sans-serif; font-weight: bold; font-size: 1.5rem;">
                Project Management System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>



    <main class="py-4">
        <!-- Off-canvas content -->
        <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 300px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel"> Project Management System </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <!-- Added Navbar items -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('project.index') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('system.index') }}">Systems</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manager.index') }}">Managers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('businessUnit.index') }}">Business Units</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('developer.index') }}">Developers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('progressReport.index') }}">Progress</a>
                    </li>
                </ul>

            </div>
            <footer class="bg-dark text-white text-center py-3">
                <p>&copy; 2024 Aiman Hazim <span style="color: yellow;">&#9733;</span></p>
            </footer>
        </div>

        <!-- Your page content goes here -->
        @yield('content')

    </main>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasExample'));

        document.querySelector('.navbar-toggler').addEventListener('click', function () {
            offcanvas.toggle();
        });
    });
</script>
</body>

</html>
