@extends('layout')
<?php $login=Auth::user()->login; ?>
@section('title', 'Профиль '. $login)

@section('sidebar')
    @parent
@endsection

@section('content')

@endsection
