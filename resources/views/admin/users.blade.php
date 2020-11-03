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
            Подтверждение аккаунта
        </td>
        <td>
            Дата регистрации
        </td>
        <td>
            Онлайн
        </td>
    </tr>
@foreach($user as $users)
<tr>
    <h3>
        <td>
            {{$users->login}}
        </td>
        <td>
            {{$users->email}}
        </td>
        <td>
            {{$users->exp}}
        </td>
        <td>
            {{$users->auth}}
        </td>
        <td>
            {{$users->created_at}}
        </td>
        <td>
            @if($users->isOnline())
                <span style="color:green">В сети</span>
            @else
                <span style="color:red">Не в сети</span>
            @endif
        </td>
    </h3>
</tr>
@endforeach
</table>
@endsection
</body>
</html>
