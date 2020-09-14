@extends('layout')

@section('title', 'Главная страница')

@section('sidebar')
    @parent
@endsection

@section('namestr', 'Главная страница')

@section('content')
    <div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regModal">
        Регистрация
    </button></div>
    <!-- Modal -->
    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Регистрация</h5>
                </div>
                <div class="modal-body">
                    <form action="/reg" method="post">
                        @csrf
                        <div>
                            <input type="text" required name="login" placeholder="Введите логин"/>
                        </div>
                        <div>
                            <input type="text" required name="mail" placeholder="Введите почту"/>
                        </div>
                        <div>
                            <input type="password" required name="password" placeholder="Введите пароль"/>
                        </div>
                        <div>
                            <input type="password" required name="password2" placeholder="Подтвердите пароль"/>
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
    <div>Авторизация</div>
@endsection
