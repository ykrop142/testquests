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
    <title>Банлист</title>
</head>
<body>
@extends('layout')
@section('content')
    <p>Банлист</p>
    <ul>
        @foreach($ban as $bans)
            <h3>
                <li>
                    {{ $bans->id_user }}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editbanModal{{$bans->id}}">
                        Изменить причину/время блокировки
                    </button>
                    <ul>
                        <li>
                            {{ $bans->reason }}
                        </li>
                        <ul>
                            <li>
                                {{$bans->validity}}
                            </li>
                        </ul>
                    </ul>

                </li>
            </h3>
            <div class="modal fade" id="editbanModal{{$bans->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">BANHAMMER</h5>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/{{$bans->id}}" method="post">
                                {{method_field('PATCH')}}
                                {{csrf_field()}}
                                <div>
                                    <input type="text" name="id_user" placeholder="Имя пользователя" value="{{$bans->id_user}}"/>
                                </div>
                                <div>
                                    <input type="text" name="reason" placeholder="Причина" value="{{$bans->reason}}"/>
                                </div>
                                <div>
                                    <input type="date" name="validity" placeholder="длительность" value="{{$bans->validity}}"/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
@endsection
</body>
</html>
