@extends('layout')

@section('title', 'Корзина')
<head>
    <style>
        .container > .row > .col-4 > p{
            width: 400px;
            height: 50px;
            border: 4px double black;
            background: green;
            color: #c4a917;
            text-align: center
        }

        .container > .row > .col-4 > p > .btn{
            display: inline-block;
            background: green;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .container > .row > .col-4 > p > .btn:hover{
            display: inline-block;
            background: #11ff03;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

    </style>
</head>

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <?php $sum=0 ?>
            @forelse($coldublord as $coldublords)
                <div class="col-4">
                    <p>
                        {{$coldublords->nameitem}}
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <a href="/orders/down/{{$coldublords->id_item}}" class="btn">-</a>
                        {{$coldublords->count}}шт
                        <a href="/orders/up/{{$coldublords->id_item}}" class="btn">+</a>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        {{$coldublords->price}} руб
                        @php
                            $sum=$sum+$coldublords->price;
                        @endphp
                    </p>
                </div>
            @empty
                <div class="col-12">
                    <p>
                        Корзина пуста
                    </p>
                </div>
            @endforelse
        </div>
    </div>
    @forelse($coldublord as $coldublords)
        <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback">Оформление заказа ({{$sum}}) Руб.</button></p>
        @break($coldublords)
    @empty
    @endforelse

    <div class="modal" tabindex="-1" role="dialog" id="feedback">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтверждение заказа</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/orders/buy" method="post">
                        @csrf
                        <input type="text" name="address" required placeholder="Введите Ваш адрес" style="width: 300px">
                        <input type="text" id="phone" name="phone" required  placeholder="Введите Ваш номер телефона" style="width: 300px">
                        <input type="email" name="email" required  placeholder="Введите Вашу почту" style="width: 300px">
                        <textarea rows="10" placeholder="Введите комментарий к заказу" name="comment" cols="20" wrap="hard" style="height: 200px;width: 300px"></textarea>

                        <div class="modal-footer">
                            <button type="submit">Подтвердить заказ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $("#phone").mask("8 (999) 999-99-99");
        });
    </script>
@endsection
