<style>
    #menu{
        position: absolute;
        top: 1%;
        left: 1%;
    }
</style>
@yield('content')
    <ul id="menu">
        <li><a href="/">Главная</a></li>
        <li><a href="/admin">Банлист</a></li>
        <li><a href="/admin/create">Банхамер</a></li>
        <li><a href="/admin/users">Пользователи</a></li>
    </ul>

