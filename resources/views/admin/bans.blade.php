<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    @foreach($ban as $bans)
       <h1> <li>{{ $bans->id_user }}</li></h1>
        <h2> <li>{{ $bans->reason }}</li></h2>
    @endforeach
</ul>
</body>
</html>
