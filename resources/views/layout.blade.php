<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
@section('sidebar')
    <ul id="menu" align="left" style="position: relative ; z-index: 2;">
        <li><a href="/main">главная страница</a></li>
        <li><a href="/">Карта</a></li>
        <li><a href="/admin">Банлист</a></li>
        <li><a href="/admin/create">Забанить</a></li>
        <li><a href="/admin/users">Инфо о пользователях</a></li>
        <li>
            <?php
                if (Auth::check()) {
            ?>
            <div class="userlogout">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <button> {{ __('Выйти') }}</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <?php
                }
                else
                    {
            ?>
            <div class="userlogin">
                <a class="userlogin" href="{{ route('login') }}"><button>{{ __('Войти') }}</button></a>
            </div>
            <?php
                }
            ?>
        </li>
    </ul>
@show

<div>
    <h2 style="position: relative ;top: 10%;left: 50%">
        @yield('namestr')
    </h2>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
