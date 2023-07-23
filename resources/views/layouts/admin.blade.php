<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="toastr.css" rel="stylesheet"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


    <title>78</title>
    @vite(['resources/scss/normalize.scss','resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div class="wrapper">
    <header class="header !py-2">
        <div class="container">
            <div class="flex justify-between w-full items-center">
                <a href="#" class="logo">
                    Админ панель
                </a>
                <div class="avatar"><img src="{{asset('sources/images/avatar.png')}}" alt=""></div>
            </div>
        </div>
    </header>
    <main class="flex">
        @yield('content')
    </main>

</div>

<x-loader></x-loader>

<script src="toastr.js"></script>
</body>
</html>
