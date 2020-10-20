<?php
    use Carbon\Carbon;
    $dater = Carbon::now()->addDays(30);
    $dater= $dater-> toDateString();
?>
<!doctype html>
<html lang="en">

<body>
@extends('layout')
@section('title', 'Banhammer')
@section('sidebar')
    @parent
@endsection

@section('namestr', '')

@section('content')

<!-- Button ban modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#banModal">
    Banhammer
</button>
<!-- Modal -->
<div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">BANHAMMER</h5>
            </div>
            <div class="modal-body">
                <form action="/admin/create" method="post">
                    @csrf
                    <div>
                        <input type="text" required name="id_user" placeholder="Имя пользователя"/>
                    </div>
                    <div>
                        <input type="text" required name="reason" placeholder="Причина"/>
                    </div>
                    <div>
                        <input type="date" required name="validity" placeholder="длительность" value="{{$dater}}"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Заблокировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
