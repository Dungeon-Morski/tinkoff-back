@extends('layouts.auth')
@section('content')
    <div class="auth_container flex justify-center items-center">
        <div class="auth_card">
            <h1>Авторизация</h1>
            <form action="{{route('auth')}}" method="post" class="register_form">
                @csrf
                <div class="fields_wrapper flex flex-col">
                    <div>
                        <input class="!pl-2 rounded" type="text" placeholder="Логин" name="login"></div>
                    <div>
                        <input class="!pl-2 rounded password_field" type="password" placeholder="Пароль"
                               name="password">

                    </div>
                </div>
                @foreach($errors->all() as $message)
                    <p class="text-danger mt-1">{{$message}}</p>
                @endforeach
                <button type="submit">Войти</button>
            </form>

        </div>
    </div>
@endsection
