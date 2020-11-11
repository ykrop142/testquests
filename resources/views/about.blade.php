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

@section('title', 'О нас')

@section('sidebar')
    @parent
@endsection

@section('content')
    @foreach($about as $abouts)
        <div class="text">
            <p style="border: 4px double black; background: green; color: #c4a917">{{$abouts->text_about}}</p>
        </div>
    @endforeach
@endsection
