@extends('layout')

@section('title', 'О нас')

@section('sidebar')
    @parent
@endsection

@section('namestr', 'О нас')

@section('content')
    @foreach($about as $abouts)
        <p>{{$abouts->text_about}}</p>
    @endforeach
@endsection
