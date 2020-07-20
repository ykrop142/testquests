<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Бан</title>
</head>
<body>
    <form action="/admin" method="post">
        {{csrf_field()}}
        <div>
            <input type="text" name="id_user" placeholder="Имя пользователя"/>
        </div>
        <div>
            <input type="text" name="reason" placeholder="Причина"/>
        </div>
        <div>
            <input type="date" name="validity" placeholder="длительность"/>
        </div>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
