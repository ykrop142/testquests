<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <style>
        .tabb {
            width: 70%; /* Ширина блока */
            padding: 10px; /* Поля */
            margin-top: 10%; /* Отступ сверху */
            margin-left: 10%; /* Отступ сверху */
            border: 2px solid #000; /* Параметры рамки */
            -moz-box-sizing: border-box; /* Для Firefox */
            box-sizing: border-box; /* Ширина блока с полями */
        }
    </style>
</head>
<body>
@extends('layout')

@section('title', 'Инфо о пользователях')

@section('sidebar')
    @parent
@endsection

@section('namestr', 'Инфо о пользователях')

@section('content')
<table bordercolor="black" border="1" class="tabb" width="100%">
    <tr>
        <td>
            Логин
        </td>
        <td>
            Почта
        </td>
        <td>
            Опыт
        </td>
        <td>
            Уровень
        </td>
        <td>
            Роль
        </td>
        <td>
            Жалоб
        </td>
        <td>
            Подтверждение аккаунта
        </td>
        <td>
            Дата регистрации
        </td>
        <td>
            Онлайн
        </td>
        @foreach($user as $users)
            @if($users->isOnline())
            @else
                <td>
                    <span>Последняя авторизация</span>
                </td>
            @endif
        @endforeach
    </tr>
@foreach($user as $users)
<tr>
    <h3>
        <td>
            <a href="/admin/viewprofil/{{$users->id}}">{{$users->login}}</a>
        </td>
        <td>
            {{$users->email}}
        </td>
        <td>
            {{$users->exp}}
        </td>
        <td>
            {{$users->lvl}}
        </td>
        <td>
            <text style="color: {{$users->rgb}}">{{$users->id_tit}}</text>
        </td>
        <td>
            {{$users->varn}}
        </td>
        <td>
            @if($users->auth==0)
                Почта не подтверждена
            @else
                Почта подтверждена
            @endif
        </td>
        <td>
            {{$users->created_at}}
        </td>
        @if($users->isOnline())
            <td>
                <span style="color:green">В сети</span>
            </td>
            <td>
                <span style="color:green">онлайн</span>
            </td>
        @else
            <td>
                <span style="color:#ff0101">Не в сети</span>
            </td>
            <td>
                <span style="color:#ff0101">был в сети {{$users->last_online_at}}</span>
            </td>
            @endif
    </h3>
</tr>
@endforeach
</table>
@endsection
</body>
</html>
