<?php
    use Carbon\Carbon;
    $dater = Carbon::now()->addDays(30);
    $dater= $dater-> toDateString();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<body>
@extends('layout')
@section('title', 'Banhammer')
@section('sidebar')
    @parent
@endsection

@section('namestr', 'Banhammer')

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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
</body>
</html>
