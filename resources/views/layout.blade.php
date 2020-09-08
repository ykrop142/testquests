<html>
<head>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
@section('sidebar')
    <ul id="menu" style="position: relative; z-index: 2;">
        <li><a href="/main">главная страница</a></li>
        <li><a href="/">Карта</a></li>
        <li><a href="/admin">Банлист</a></li>
        <li><a href="/admin/create">Забанить</a></li>
        <li><a href="/admin/users">Инфо о пользователях</a></li>
    </ul>
@show

<div>
    <h2 style="position: absolute;top: 10%;left: 50%">
        @yield('namestr')
    </h2>

</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>
