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
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset("css/dropmain.css") }}" type="text/css">
    <script src="{{ asset("js/jquery.maskedinput.min.js") }}" crossorigin="anonymous"></script>
</head>

<body>
@section('sidebar')
    <div class="containermain">
        <div class="row">
            <div class="col">
                    <a href="/"><i class="fas fa-home"></i> Главная страница</a>
            </div>
            <div class="col">
                <a href="/about"><i class="fas fa-home"></i> О нас</a>
            </div>
            <div class="col">
                <a href="/contact"><i class="fas fa-home"></i> Контакты</a>
            </div>
            <div class="col">
                <a href="/orders"><i class="fas fa-home"></i> Корзина</a>
            </div>
        </div>
    </div>
@show

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
