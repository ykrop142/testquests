@extends('layout')
<head>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
</head>
@section('title', 'Карта')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <p></p>
                <p>Адрес : ул. Щорса, 41</p>
                <p>Почта : text@e.mail</p>
                <p>Номер телефона : 88888888</p>
                <p>Доп инфа : Доставка работает с 8:00 до 23:00</p>
                <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback">Обратная связь</button></p>
            </div>
            <div class="col-6" id="map" style="height: 500px"></div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="feedback">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Форма обратной связи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/contact/feedback" method="post">
                        @csrf
                        <p><input type="email" name="email" required  placeholder="Введите Вашу почту" style="width: 300px"></p>
                        <p><input  id="phone" name="phone" required  placeholder="Введите Ваш номер телефона" type="text" style="width: 300px"></p>
                        <p><input type="text" name="text_feedback" required  placeholder="Введите Ваше обращение" style="height: 200px;width: 300px"></p>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        </div>

                    </form>
                     </div>

            </div>
        </div>
    </div>
<script>
    let streetLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=sk.eyJ1IjoieWtyb3AxNDIiLCJhIjoiY2tiOXdnNGYzMDBwMTJzcnI0aGZodGN6dyJ9.jrFbhg3G3pKCsXoxmJmcYw', {
        maxNativeZoom: 19,
        maxZoom: 22,
        attribution: 'Imagery © <a id="3" href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    });
    let map = L.map('map', {
        layers: [streetLayer],
        zoomControl:true
    });

    map.setView([55.991156592910954, 92.95507483184339], 19);

    var latlngs = [[55.99112208794039, 92.95501045882703],
        [55.991156592910954, 92.95517139136793],
        [55.99106132911304, 92.9552485048771],
        [55.99102944944319, 92.95507483184339]];

    var polygon = L.polygon(latlngs, {color: 'green'}).addTo(map);
    polygon.bindPopup(
        '<p>'+'<img src="https://test.greenkras.ru/image/photo/vhod.PNG" class="big" alt="" ' +
        'style="height: 230px;width: 230px;">'+'</p>'+
        '<p>'+'Адрес : ул. Щорса, 41'+'</p>'+
        '<p>'+'Почта : text@e.mail'+'</p>'+
        '<p>'+'Номер телефона : 88888888'+'</p>'+
        '<p>'+'Доп инфа : Доставка работает с 8:00 до 23:00'+'</p>');

    $(function(){
        $("#phone").mask("8 (999) 999-99-99");
    });
</script>
@endsection
