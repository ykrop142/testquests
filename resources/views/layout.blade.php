<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/dropmain.css") }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">



</head>

<body>
@section('sidebar')
    <nav>
        <ul class="main">
            <li>
                <a href="/main">Главная страница</a>
                <ul class="drop menu1">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">contact</a></li>
                    <li><a href="#">about</a></li>
                </ul>
            </li>
            <li><a href="/">Карта</a>
                <ul class="drop menu2">
                </ul>
            </li>
            <li><a href="/admin">Админка</a>
                <ul class="drop menu3">
                    <li><a href="/admin/create">Забанить</a></li>
                    <li><a href="/admin/users">Инфо о пользователях</a></li>
                    <li><a href="#">тест 3</a></li>
                    <li><a href="#">тест 4</a></li>
                </ul>
            </li>
            <li><a href="#">Личный кабинет</a>
                <ul class="drop menu4">
                    <li><a href="#">Профиль</a></li>
                    <li><a href="#">Статистика</a></li>
                    <li><a href="#">Настройки</a></li>
                    <li>
                        <?php
                        if (Auth::check()) {
                        ?>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Выйти') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <?php
                        }
                        else
                        {
                        ?>
                        <a href="{{ route('login') }}">{{ __('Войти') }}</a>

                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
@show


<div class="container">
    @yield('content')
</div>

</body>
</html>
