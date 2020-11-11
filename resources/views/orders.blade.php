@extends('layout')


@section('title', 'Корзина')
<head>
    <style>
        .container > .row > .col-4 > p{
            width: 400px;
            height: 50px;

            border: 4px double black;
            background: green;
            color: #c4a917;
            text-align: center
        }

        .container > .row > .col-4 > p > .btn{
            display: inline-block; /* Строчно-блочный элемент */
            background: green; /* Серый цвет фона */
            color: #fff; /* Белый цвет текста */
            /* Поля вокруг текста */
            text-decoration: none; /* Убираем подчёркивание */
            border-radius: 3px; /* Скругляем уголки */
        }

        .container > .row > .col-4 > p > .btn:hover{
            display: inline-block; /* Строчно-блочный элемент */
            background: #11ff03; /* Серый цвет фона */
            color: #fff; /* Белый цвет текста */
            /* Поля вокруг текста */
            text-decoration: none; /* Убираем подчёркивание */
            border-radius: 3px; /* Скругляем уголки */
        }

    </style>
</head>
@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
@foreach($coldublord as $coldublords)
            <div class="col-4">
                <p>
                    {{$coldublords->nameitem}}
                </p>
            </div>
            <div class="col-4">
                <p style="border: 4px double black; background: green; color: #c4a917">
                    <a href="/orders/down/{{$coldublords->id_item}}" class="btn">-</a>
                    {{$coldublords->count}}шт
                   <a href="/orders/up/{{$coldublords->id_item}}" class="btn">+</a>
                </p>
            </div>
                <div class="col-4">
                    <p style="border: 4px double black; background: green; color: #c4a917">
                        {{$coldublords->price}} руб
                    </p>
                </div>
@endforeach
        </div>
    </div>
@endsection
