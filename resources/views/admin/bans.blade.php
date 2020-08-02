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
    <style>
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
        #titleb{
            position: absolute;
            top: 10%;
            left: 50%;
        }
        .btnban {
            background: #ea2626;
            border: 0;
            border-right: 1px solid #cbcbcc;
            height: 100%;
            width: 100%;
        }
        .btnunban {
            background: #16862a;
            border: 0;
            border-right: 1px solid #cbcbcc;
            height: 100%;
            width: 100%;
        }
        .btn:hover {
            background: rgba(105, 125, 219, 0.95);
        }
    </style>
</head>
<body>
@extends('layout')
@section('content')
    <p ><h2 id="titleb">Банлист</h2></p>
@endsection

    <table bordercolor="black" border="1" class="tabb" width="100%">
        @foreach($ban as $bans)
            <tr>
                <h3>
                    <td>
                        {{ $bans->id_user }}
                    </td>
                    <td>
                        {{ $bans->reason }}
                    </td>
                    <td>
                        {{$bans->validity}}
                    </td>
                    <td>
                        <button type="button" class="btnban btn-primary" data-toggle="modal" data-target="#editbanModal{{$bans->id}}">
                            Редактировать
                        </button>
                        <button type="button" class="btnunban btn-primary" data-toggle="modal" data-target="#editunbanModal{{$bans->id}}">
                            Разблокировать
                        </button>
                    </td>
                </h3>
            </tr>

            <div class="modal fade" id="editbanModal{{$bans->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Редактор бана</h5>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/{{$bans->id}}" method="post">
                                @method('PATCH')
                                @csrf
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

            <div class="modal fade" id="editunbanModal{{$bans->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Редактор бана</h5>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/{{$bans->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <div>
                                    Вы уверены, что хотите разблокировать пользователя: {{$bans->id_user}}
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                    <button type="submit" class="btn btn-primary">Подтвердить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</table>

</body>
</html>
