<head>
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
@extends('layout')

@section('title', 'Информация о пользователях')

@section('sidebar')
    @parent
@endsection

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
            <a href="/admin/viewprofile/{{$users->id}}">{{$users->login}}</a>
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
