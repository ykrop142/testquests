<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель модератора</title>
</head>
<body>
<button id="userinfobut">Информация о пользователях(открыть)</button>

<div id="userinfodiv" style="display: none;">
    Отображаемый блок
</div>


</div>
<script>
    window.onload= function() {
        document.getElementById('userinfobut').onclick = function() {
            openbox('userinfodiv', this);
            return false;
        };
    };
    function openbox(id, userinfobut) {
        var div = document.getElementById(id);
        if(div.style.display == 'block') {
            div.style.display = 'none';
            userinfobut.innerHTML = 'Информация о пользователях(открыть)';
        }
        else {
            div.style.display = 'block';
            userinfobut.innerHTML = 'Информация о пользователях(закрыть)';
        }
    }
</script>

</body>
</html>
