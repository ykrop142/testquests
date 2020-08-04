<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Главная</title>
</head>
<body>
@extends('layout')
@section('content')
    <p>Главная</p>
@endsection

<!-- блок карты-->
<div id="map" style="position: fixed;width: 100%; height: 100%"></div>
<!-- конец блока-->

<script>
// подключение слоев
    let cities = new Array();
//

// немного магии
    let streetLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=sk.eyJ1IjoieWtyb3AxNDIiLCJhIjoiY2tiOXdnNGYzMDBwMTJzcnI0aGZodGN6dyJ9.jrFbhg3G3pKCsXoxmJmcYw', {
        maxNativeZoom: 19,
        maxZoom: 22,
        attribution: '<a href="https://greenkras.ru/">ykrop142</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    });
//

// карта
    let map = L.map('map', {
        center: [56.007725, -92.854777],
        maxNativeZoom: 19, // OSM max available zoom is at 19.
        maxZoom: 22, // Match the map maxZoom, or leave map.options.maxZoom undefined.
        zoom: 10,
        layers: [streetLayer],
        zoomControl:false
    });
//

// еще магии слоев
    let baseLayers = {
        "Зеленый Красноярск": streetLayer
    };
    let overlays = {
    };
//

// локация
    function onLocationFound(e) {
        L.marker(e.latlng).addTo(map).bindPopup("Вы здесь").openPopup();
    }
    function onLocationError(e) {
        alert(e.message);
    }
    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);
    map.locate({setView: true,maxZoom: 22});
// конец блока



// метки
    let myIconCred = L.icon({
        iconUrl: 'https://greenkras.ru/images/tree/yel.svg',
        iconSize: [50, 50],
        iconAnchor: [50, 50],
        popupAnchor: [-3, -76]
    });
    let myIconHor = L.icon({
        iconUrl: 'https://greenkras.ru/images/tree/green.svg',
        iconSize: [50, 50],
        iconAnchor: [50, 50],
        popupAnchor: [-3, -76]
    });
    let myIconPloh = L.icon({
        iconUrl: 'https://greenkras.ru/images/tree/red.svg',
        iconSize: [50, 50],
        iconAnchor: [50, 50],
        popupAnchor: [-3, -76]
    });
//
</script>
</body>
</html>
