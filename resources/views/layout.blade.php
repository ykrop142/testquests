<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d5f712159e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/dropmain.css") }}" type="text/css">
</head>

<body>
@section('sidebar')
    <div class="containermain">
        <div class="row">
            <div class="col">
                <a href="javascript:void(0);" class="linkdropmenu" data-toggle="dropdown" aria-expanded="false">
                    <img class="userAvatar" src="/image/iconmenu/mainico.svg" alt="" style="width: 64px;height: 64px"><span class="hidden-xs">
                   Главная страница
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/"><i class="fas fa-home"></i> Главная страница</a></li>
                    <li><a href="#"><i class="far fa-newspaper"></i> news</a></li>
                    <li><a href="#"><i class="fas fa-tty"></i> contact</a></li>
                    <li><a href="#"><i class="far fa-address-card"></i> about</a></li>
                </ul>
            </div>
            <div class="col">
                <a href="/map" class="linkdropmenu"><img class="userAvatar" src="/image/iconmenu/mapico.PNG" alt="" style="width: 64px;height: 64px">
                             Карта
                </a>
            </div>
            <div class="col">
                <a href="javascript:void(0);" class="linkdropmenu" data-toggle="dropdown" aria-expanded="false">
                    <img class="userAvatar" src="/image/iconmenu/adminico.png" alt="" style="width: 64px;height: 64px"><span class="hidden-xs">
                    Админка
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/admin"><i class="fas fa-user-shield"></i> Админка</a></li>
                    <li><a href="/admin/create"><i class="fas fa-user-slash"></i> Забанить</a></li>
                    <li><a href="/admin/users"><i class="fas fa-file-invoice"></i> инфо юз</a></li>
                </ul>
            </div>
            <div class="col">
                <?php
                if (Auth::check())
                {
                ?>
                <a href="javascript:void(0);" class="linkdropmenu" data-toggle="dropdown" aria-expanded="false">
                    <img class="userAvatar" src="{{Auth::user()->avatar}}" alt="" style="width: 64px;height: 64px"><span class="hidden-xs">
                    <?php
                        if(empty(Auth::user()->login))
                        {
                            ?>
                     <?php
                        }
                        else
                        {
                        ?>
                        {{Auth::user()->login}}
                        <?php
                        }
                        ?>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/lk/profile"><i class="fas fa-user"></i> Профиль</a></li>
                    <li><a href="/lk/ucp"><i class="fas fa-cog"></i> Настройки</a></li>
                    <li><a href="/lk/ucp"><i class="fas fa-bell"></i> Голосования</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>{{ __(' Выйти') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <?php
                        }
                        else
                        {
                        ?>
                        <a href="{{ route('login') }}"><i class="fas fa-power-off"></i>{{ __('Войти') }}</a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@show

<div class="container">
    @yield('content')
</div>

</body>
</html>
