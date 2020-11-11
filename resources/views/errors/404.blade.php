@extends('layout')
<head>
    <style>
        .text {
            width: 500px; /* Ширина элемента в пикселах */
            padding-top: 30%; /* Поля вокруг текста */
            margin: auto; /* Выравниваем по центру */
        }
    </style>
</head>

@section('title', 'Страница не найдена')

@section('sidebar')
    @parent
@endsection

@section('namestr', 'Страница не найдена')

@section('content')
<div class="text">
    <h1> <p style="border: 4px double black; background: green; color: #c4a917">Страница не найдена, вернитесь на гланую страницу и попробуйте снова</p></h1>
</div>
@endsection
