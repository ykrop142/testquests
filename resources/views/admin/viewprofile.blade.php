<head>
    <link rel="stylesheet" href="{{ asset("css/profile.css") }}">
</head>
@extends('layout')
<?php $login=$user->login; ?>
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
                @if($user->isOnline())
                    <span style="color:green">В сети</span>
                @else
                    <span style="color:red">Не в сети</span>
                @endif
                <p></p>
                <p> <img class="userAvatar" src="{{$user->avatar}}" alt="" style="width: 200px;height: 200px"></p>
                <p> " Прогресс бар " {{$user->exp}}</p>
                <p> Ваш уровень : {{$user->lvl}}</p>
                <p> Роль [ <font style="color:{{$user->rgb}}">{{$user->id_tit}} </font>]</p>
            </div>
            <div class="col">
                <p>Логин: {{$user->login}}</p>
                <p>Почта: {{$user->email}}</p>
                <p>Подтверждение почты: {{$user->auth}}</p>
                <p>Жалоб: {{$user->varn}}</p>
                <p>Отмечено объектов: в разработке</p>
                <p>Всего голосов: в разработке</p>
                <p>Регистрация аккаунта: {{$user->created_at}}</p>
            </div>
        </div>
    </div>
@endsection
