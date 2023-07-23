<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (Request::segment(1) == 'register') ? 'Создать профиль' : 'Войти'; ?></title>

    @vite(['resources/scss/normalize.scss','resources/scss/app.scss','resources/css/app.css'])
</head>
<body>

@yield('content')
<x-loader></x-loader>
@vite(['resources/js/app.js'])
</body>
</html>
