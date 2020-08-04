<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Информация о пользователях</title>
    <style>
        #titleb{
            position: absolute;
            top: 10%;
            left: 40%;
        }
        .tabb {
            position: absolute;
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
@section('content')
    <p ><h2 id="titleb">Информация о пользователях</h2></p>
@endsection
<table bordercolor="black" border="1" class="tabb" width="100%">
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

    </h3>
</tr>
@endforeach
</table>
</body>
</html>
