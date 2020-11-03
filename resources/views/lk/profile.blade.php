<head>
    <link rel="stylesheet" href="{{ asset("css/profile.css") }}">
</head>
@extends('layout')
<?php $login=Auth::user()->login; ?>
@section('title', 'Профиль '. $login)

@section('sidebar')
    @parent
@endsection

@section('content')
    <p> </p>
    <p> </p>
    <div class="container" style="z-index:1">
        <div class="row">
            <div class="col">
                @if(Auth::user()->isOnline())
                    <span style="color:green">В сети</span>
                @else
                    <span style="color:red">Не в сети</span>
                @endif
                <p></p>
                <p> <img class="userAvatar" src="{{Auth::user()->avatar}}" alt="" style="width: 200px;height: 200px"></p>
                <p> " Прогресс бар " {{Auth::user()->exp}}</p>
                <p> Ваш уровень : {{Auth::user()->lvl}}</p>
                <p> Роль [ <font style="color:{{$titles->RGB}}">{{$titles->name}} </font>]</p>
            </div>
            <div class="col">
                <p>Логин: {{Auth::user()->login}}</p>
                <p>Почта: {{Auth::user()->email}}</p>
                <p>Подтверждение почты: {{Auth::user()->auth}}</p>
                <p>Жалоб: {{Auth::user()->varn}}</p>
                <p>Отмечено объектов: в разработке</p>
                <p>Всего голосов: в разработке</p>
                <p>Регистрация аккаунта: {{Auth::user()->created_at}}</p>
            </div>
        </div>
    </div>
@endsection
