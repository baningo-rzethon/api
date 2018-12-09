<?php

use app\core\autoload\PathProvider;

require_once (new PathProvider())->view('inc/header');
require_once (new PathProvider())->view('inc/flash');
?>
    <div class="container-fluid bg-light" style="min-height: 1000px;">
        <div class="row p-5">
            <div class="col-md-4 text-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/POL_Rzesz%C3%B3w_COA.svg/800px-POL_Rzesz%C3%B3w_COA.svg.png"
                     class="img-fluid" style="max-height: 200px;"><br><br>
                <span class="text-primary display-3 ">#rzeTour</span>
                <p class="text-muted">Informacje w zasięgu Twojej ręki</p>
            </div>
            <div class="col-md-8 text-center pt-5">
                <p class="text-muted" style="font-size: 200%;" id="watch"></p>
                <span style="font-size: 400%;">Dzień dobry, <b><?= $data->user->name ?></b>! <a class="btn btn-primary" href="/rzethon/checkin/fail">wyloguj</a></span>
                <p class="text-muted" style="font-size: 200%;">Odwiedzasz #rzeTour <b><?= $data->checkIn->name ?></b>
                </p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4 p-5">
                <h1>Warte uwagi w okolicy:</h1>
                <p class="text-muted">Lista stworzona według Twoich preferencji</p>
                <ul class="list-group" style="font-size:120%;">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="fas fa-cocktail"></i> Pewex PUB <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="fas fa-hotel"></i> Hotel pod ratuszem <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="fa fa-coffee"></i> Kawa Rzeszowska <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="fa fa-coffee"></i> Hola Lola <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="fas fa-apple-alt"></i>Pizzeria radość <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="fas fa-apple-alt"></i>Pizzeria Geronimo <span class="badge badge-primary">sprawdź</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-8" id="map" style="height: 420px;">

            </div>
        </div>
    </div>
    <script>
        function zegarek() {
            let data = new Date();
            let godzina = data.getHours();
            let minuta = data.getMinutes();
            let sekunda = data.getSeconds();
            let dzien = data.getDate();
            let dzienN = data.getDay();
            let miesiac = data.getMonth();
            let rok = data.getFullYear();

            if (minuta < 10) minuta = "0" + minuta;
            if (sekunda < 10) sekunda = "0" + sekunda;

            let dni = new Array("niedziela", "poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota");
            let miesiace = new Array("stycznia", "lutego", "marca", "kwietnia", "maja", "czerwca", "lipca", "sierpnia", "września", "października", "listopada", "grudnia");

            var pokazDate = "Dzisiaj jest " + dni[dzienN] + ', ' + dzien + ' ' + miesiace[miesiac] + ' ' + rok + " Godzina " + godzina + ':' + minuta + ':' + sekunda;
            document.getElementById("watch").innerHTML = pokazDate;
            setTimeout(zegarek, 1000);
        }
    </script>
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script>
        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());

        var lonLat = new OpenLayers.LonLat(22.00489, 50.0375)
            .transform(
                new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                map.getProjectionObject() // to Spherical Mercator Projection
            );

        var zoom=18;

        var markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);

        markers.addMarker(new OpenLayers.Marker(lonLat));

        map.setCenter (lonLat, zoom);
    </script>
<?php
require_once (new PathProvider())->view('inc/footer');