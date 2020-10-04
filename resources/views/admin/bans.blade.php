@extends('layout')

@section('title', 'Банлист')
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<style>
    .tabb {
        width: 80%; /* Ширина блока */
        padding: 10px; /* Поля */
        margin-top: 5%; /* Отступ сверху */
        margin-left: 5%; /* Отступ сверху */
        border: 2px solid #000; /* Параметры рамки */
        -moz-box-sizing: border-box; /* Для Firefox */
        box-sizing: border-box; /* Ширина блока с полями */
    }
    #btnban {
        background: #ea2626;
        border: 0;
        border-right: 1px solid #cbcbcc;
        height: 50%;
        width: 47%;
    }
    #btnunban {
        background: #16862a;
        border: 0;
        border-right: 1px solid #cbcbcc;
        height: 50%;
        width: 48%;
    }
    #btnban:hover {
        background: rgba(105, 125, 219, 0.95);
    }
    #btnunban:hover {
        background: rgba(105, 125, 219, 0.95);
    }
</style>
@section('sidebar')
    @parent
@endsection

@section('namestr', 'Банлист')

@section('content')

@foreach($user as $users)
    {{$users->login}}
@endforeach
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
                        <button type="button" id='btnban' class="btn-primary" data-toggle="modal" data-target="#editbanModal{{$bans->id}}">
                            Редактировать
                        </button>
                        <button type="button" id='btnunban' class="btn-primary" data-toggle="modal" data-target="#editunbanModal{{$bans->id}}">
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
                            <form action="admin/{{$bans->id}}" method="post">
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
@endsection

