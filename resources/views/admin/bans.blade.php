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
        height: 100%;
        width: 100%;
        padding: 0px;
    }
    #btnunban {
        background: #16862a;
        border: 0;
        border-right: 1px solid #cbcbcc;
        height: 100%;
        width: 100%;
        padding: 0px;
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

    <table bordercolor="black" border="1" class="tabb" width="100%">
        <tr>
            <h3>
                <td>
                    Логин пользователя
                </td>
                <td>
                    Причина
                </td>
                <td>
                    Дата разблокировки
                </td>
                <td colspan="2" align="center">
                    Управление
                </td>

            </h3>
        </tr>
        @foreach($data as $datas)
            <tr>
                <h3>
                    <td>
                        {{ $datas->user }}
                    </td>
                    <td>
                        {{ $datas->reason }}
                    </td>
                    <td>
                        {{$datas->validity}}
                    </td>
                    <td>
                        <button type="button" id='btnban' class="btn-primary" data-toggle="modal" data-target="#editbanModal{{$datas->id}}">
                            Редактировать
                        </button>
                    </td>
                    <td>
                        <button type="button" id='btnunban' class="btn-primary" data-toggle="modal" data-target="#editunbanModal{{$datas->id}}">
                            Разблокировать
                        </button>
                    </td>
                </h3>
            </tr>


            <div class="modal fade" id="editbanModal{{$datas->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Редактор бана</h5>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/{{$datas->id}}" method="post">
                                @method('PATCH')
                                @csrf
                                <div>
                                    <input type="text" name="id_user" placeholder="Имя пользователя" value="{{$datas->id_user}}"/>
                                </div>
                                <div>
                                    <input type="text" name="reason" placeholder="Причина" value="{{$datas->reason}}"/>
                                </div>
                                <div>
                                    <input type="date" name="validity" placeholder="длительность" value="{{$datas->validity}}"/>
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

            <div class="modal fade" id="editunbanModal{{$datas->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Редактор бана</h5>
                        </div>
                        <div class="modal-body">
                            <form action="admin/{{$datas->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <div>
                                    Вы уверены, что хотите разблокировать пользователя: {{$datas->id_user}}
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
    {{ $data->links() }}
@endsection

