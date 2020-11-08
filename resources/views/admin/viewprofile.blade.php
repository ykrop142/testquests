<head>
    <link rel="stylesheet" href="{{ asset("css/profile.css") }}">
</head>
<?php
use Carbon\Carbon;
$dater = Carbon::now()->addDays(30);
$dater= $dater-> toDateString();
?>
@extends('layout')
<?php $login=$user->login; ?>
@section('title', 'Профиль '. $login)

@section('sidebar')
    @parent
@endsection

@section('content')
    <p></p>
    <p></p>
    <div class="container" style="z-index:1">
        <div class="row">
            <div class="col">
                @if($user->ban==0)
                @if($user->isOnline())
                    <span style="color:green">В сети</span>
                @else
                    <span style="color:red">Не в сети</span>
                @endif
                @else
                    <span style="color:red">Пользователь заблокориван по причине " {{$user->reason}} "</span>
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
                <p>
                    Жалоб: {{$user->varn}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#banModal">
                        Заблокировать
                    </button>
                    <!-- Modal -->
                <div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Заблокировать</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/create" method="post">
                                    @csrf
                                    <div>
                                        <input type="hidden" required name="id_user" placeholder="Имя пользователя" value="{{$user->id}}"/>
                                    </div>
                                    <div>
                                        <input type="text" required name="reason" placeholder="Причина"/>
                                    </div>
                                    <div>
                                        <input type="date" required name="validity" placeholder="длительность" value="{{$dater}}"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                        <button type="submit" class="btn btn-primary">Заблокировать</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </p>
                <p>Отмечено объектов: в разработке</p>
                <p>Всего голосов: в разработке</p>
                <p>Регистрация аккаунта: {{$user->created_at}}</p>
            </div>
        </div>
    </div>
@endsection
