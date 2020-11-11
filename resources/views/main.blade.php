@extends('layout')

@section('title', 'Главная страница')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1">
                <button class="menu"><a href="https://test.greenkras.ru">Меню</a></button>
            </div>
            <div class="col-1">
                <button class="menu"><a href="https://test.greenkras.ru/view/{{'Суши'}}">Суши</a></button>
            </div>
            <div class="col-1">
                <button class="menu"><a href="https://test.greenkras.ru/view/{{'Пицца'}}">Пицца</a></button>
            </div>
            <div class="col-1">
                <button class="menu"><a href="https://test.greenkras.ru/view/{{'Роллы'}}">Роллы</a></button>
            </div>
            <div class="col-1">
                <button class="menu"><a href="https://test.greenkras.ru/view/{{'Напиток'}}">Напитки</a></button>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
        @foreach($items as $item)
                <div class="col-3">
                    <img class="imageitem" src="{{$item->image}}" alt="" width="200" height="200">
                    <p class="nameitems">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#item{{$item->id}}">
                            {{$item->nameitem}}
                        </button>
                    </p>
                    <div class="modal fade susi-modal-sm" tabindex="-1"  role="dialog"  aria-labelledby="susimodal" aria-hidden="true" id="item{{$item->id}}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{$item->nameitem}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{$item->image}}" alt="" style="width: 200px; height: 200px">
                                    <p class="sostitem">{{$item->description}}</p>
                                    <p class="opisitem">{{$item->composition}}</p>
                                    <p class="wesitem">{{$item->weight}} гр.</p>
                                    <form action="/orders/add/{{$item->id}}" method="post">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">В корзину({{$item->price}}руб.)</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                        </div>
                                    </form>
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
