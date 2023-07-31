<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Админ панель</title>
    <link rel="stylesheet" href="https://snipp.ru/cdn/selectize.js/0.12.6/dist/css/selectize.default.css">
    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://snipp.ru/cdn/microplugin.js/src/microplugin.js"></script>
    <script src="https://snipp.ru/cdn/sifter.js/sifter.min.js"></script>
    <script src="https://snipp.ru/cdn/selectize.js/0.12.6/dist/js/selectize.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

{{--    <script src="https://code.jquery.com/jquery-3.7.0.min.js"--}}
{{--            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>--}}
    <!-- Scripts -->
    @vite(['resources/scss/admin.scss', 'resources/scss/app.scss','resources/js/app.js'])
</head>
<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <a class="sidebar-brand" href="{{route('admin')}}">
                                    <span class="align-middle">Admin</span>
                                </a>
                                <ul class="sidebar-nav">
                                    <li class="sidebar-header">
                                        Основное
                                    </li>

{{--                                    <li class="sidebar-item ">--}}
{{--                                        <a class="sidebar-link" href="dashboard.php">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"--}}
{{--                                                 stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                 class="feather feather-sliders align-middle">--}}
{{--                                                <line x1="4" y1="21" x2="4" y2="14"></line>--}}
{{--                                                <line x1="4" y1="10" x2="4" y2="3"></line>--}}
{{--                                                <line x1="12" y1="21" x2="12" y2="12"></line>--}}
{{--                                                <line x1="12" y1="8" x2="12" y2="3"></line>--}}
{{--                                                <line x1="20" y1="21" x2="20" y2="16"></line>--}}
{{--                                                <line x1="20" y1="12" x2="20" y2="3"></line>--}}
{{--                                                <line x1="1" y1="14" x2="7" y2="14"></line>--}}
{{--                                                <line x1="9" y1="8" x2="15" y2="8"></line>--}}
{{--                                                <line x1="17" y1="16" x2="23" y2="16"></line>--}}
{{--                                            </svg>--}}
{{--                                            <span class="align-middle">Статистика</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

                                    <li class="sidebar-item ">
                                        <a class="sidebar-link" href="{{route('users')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-user align-middle">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span class="align-middle">Пользователи</span>
                                        </a>
                                    </li>
{{--                                    <li class="sidebar-item ">--}}
{{--                                        <a class="sidebar-link" href="site.php">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"--}}
{{--                                                 stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                 class="feather feather-settings align-middle">--}}
{{--                                                <circle cx="12" cy="12" r="3"></circle>--}}
{{--                                                <path--}}
{{--                                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>--}}
{{--                                            </svg>--}}
{{--                                            <span class="align-middle">Список сайтов</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

                                    <li class="sidebar-header">
                                        Управление
                                    </li>

                                    <li class="sidebar-item ">
                                        <a class="sidebar-link" href="{{route('requisites')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-tag align-middle">
                                                <path
                                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                            </svg>
                                            <span class="align-middle"> Реквизиты</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item ">
                                        <a class="sidebar-link" href="{{route('withdraw_methods')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-tag align-middle">
                                                <path
                                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                            </svg>
                                            <span class="align-middle"> Способы вывода</span>
                                        </a>
                                    </li>

                                    <!---	<li class="sidebar-item ">
                                        <a class="sidebar-link" href="posts.php">
                                            <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle"> Posts</span>
                                        </a>
                                    </li> -->

                                    <li class="sidebar-header">
                                        Настройка
                                    </li>

                                    <!---	<li class="sidebar-item ">
                                        <a class="sidebar-link" href="settings.php">
                                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle"> Настройки</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 961px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
            </div>
        </div>
    </nav>
    <div class="main">
        <nav class="z-20 navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

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

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
{{--                                    <a class="dropdown-item" href="">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

                                    <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn ">Выйти</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="content">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a class="text-muted" href="" target="_blank"><strong>Admin</strong></a> © 2023 </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="" target="_blank"></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<x-loader></x-loader>

<style>
    input,select{
        outline: none;
    }
    .selectize-dropdown-content .option {
        cursor: pointer;
    }
</style>
</body>
</html>
