@extends('layout')

@section('title', 'Главная страница')

@section('sidebar')
    @parent
@endsection

@section('namestr', 'Главная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1">
                <a href="https://test.greenkras.ru/view/{{'Суши'}}">Суши</a>
            </div>
            <div class="col-1">
                <a href="https://test.greenkras.ru/view/{{'Пицца'}}">Пицца</a>
            </div>
            <div class="col-1">
                <a href="https://test.greenkras.ru/view/{{'Роллы'}}">Роллы</a>
            </div>
            <div class="col-1">
                <a href="https://test.greenkras.ru/view/{{'Напиток'}}">Напитки</a>
            </div>

        </div>
    </div>
<div class="container">
    <div class="row">
    @foreach($items as $item)

            <div class="col-3">
                <img class="imageitem" src="{{$item->image}}" alt="" width="200" height="200">
                <p class="nameitems">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#susi{{$item->id}}">
                        {{$item->nameitem}}
                    </button>
                </p>
                <div class="modal" tabindex="-1" role="dialog" id="susi{{$item->id}}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{$item->nameitem}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{$item->image}}" alt="">
                                <p class="sostitem">{{$item->description}}</p>
                                <p class="opisitem">{{$item->composition}}</p>
                                <p class="wesitem">{{$item->weight}} гр.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Добавить в корзину({{$item->price}}руб.)</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach
    </div>
</div>
    {{ $items->links() }}

@endsection
