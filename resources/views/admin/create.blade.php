<?php
    use Carbon\Carbon;
    $dater = Carbon::now()->addDays(30);
    $dater= $dater-> toDateString();
?>
<!doctype html>
<html lang="en">

<body>
@extends('layout')
@section('title', 'Блокировка пользователей')
@section('sidebar')
    @parent
@endsection

@section('namestr', '')

@section('content')
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
                        <button type="submit" class="btn btn-primary">Заблокировать</button>
                    </div>
                </form>

@endsection
</body>
</html>
