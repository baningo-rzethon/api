<?php

use app\core\autoload\PathProvider;

require_once (new PathProvider())->view('inc/header');
require_once (new PathProvider())->view('inc/flash');
?>
<style>
    .custom-control-label{
        font-size: 130%;
    }
</style>
    <div class="container-fluid bg-light" style="min-height: 1000px;">
        <div class="row p-5">
            <div class="col-md-4 text-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/POL_Rzesz%C3%B3w_COA.svg/800px-POL_Rzesz%C3%B3w_COA.svg.png"
                     class="img-fluid" style="max-height: 200px;"><br><br>
                <span class="text-primary display-3 ">#rzeTour</span>
                <p class="text-muted">Informacje w zasięgu Twojej ręki</p>
            </div>
            <div class="col-md-4 text-center pt-5">
                <p class="text-muted" style="font-size: 200%;" id="watch"></p>
                <span style="font-size: 400%;">Dzień dobry!</span>
                <p class="text-muted" style="font-size: 200%;">Odwiedzasz #rzeTour <b>Rynek</b>
                </p>
            </div>
            <div class="col-md-4 text-center pt-5">
                <h3 class="text-muted pt-3">Ciesz się personalizacją, złap nagrody!</h3><br>
                <img src="https://play.google.com/intl/pl/badges/images/generic/pl_badge_web_generic.png" class="img-fluid" style="height: 50px;">
                <img src="https://i-invdn-com.akamaized.net/landingPages/mobile_2018/pl/pl-badge-ios.png" class="img-fluid" style="height: 50px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 p-3">
                <div class="text-center">
                    <button class="btn btn-primary btn-lg w-100 pt-3 pb-3" data-toggle="modal"
                            data-target="#personalizacja">Co lubisz? <span class="badge badge-primary">kliknij</span>
                    </button>
                </div>
                <div class="modal" id="personalizacja">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-globe"></i> Spersonalizuj</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs pb-4" style="font-size: 110%;">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#food">Jedzenie</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#zwiedzanie">Zwiedzanie</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab"  href="#rozrywka">Rozrywka</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#zakupy">Zakupy</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content" style="font-size:110%;">
                                    <div class="tab-pane fade" id="food">
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">Sałatka</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Kebab</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">Pizza</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck4">
                                                    <label class="custom-control-label"
                                                           for="customCheck4">Burgery</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Domowe
                                                        jedzenie</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="tab-pane fade active show" id="zwiedzanie">
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck11">
                                                    <label class="custom-control-label" for="customCheck11">Stare
                                                        budowle</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck21">
                                                    <label class="custom-control-label" for="customCheck21">Budynki
                                                        miasta</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck31">
                                                    <label class="custom-control-label"
                                                           for="customCheck31">Parki</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck41">
                                                    <label class="custom-control-label"
                                                           for="customCheck41">Pomniki</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck51">
                                                    <label class="custom-control-label"
                                                           for="customCheck51">Muzea</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="tab-pane fade" id="rozrywka">
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck12">
                                                    <label class="custom-control-label"
                                                           for="customCheck12">Kluby</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck22">
                                                    <label class="custom-control-label" for="customCheck22">Puby</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck32">
                                                    <label class="custom-control-label"
                                                           for="customCheck32">Kawiarnie</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck42">
                                                    <label class="custom-control-label" for="customCheck42">Kina</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck52">
                                                    <label class="custom-control-label"
                                                           for="customCheck52">Teatry</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="tab-pane fade" id="zakupy">
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck121">
                                                    <label class="custom-control-label"
                                                           for="customCheck121">Galerie</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck221">
                                                    <label class="custom-control-label" for="customCheck221">Centra
                                                        handlowe</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck321">
                                                    <label class="custom-control-label" for="customCheck321">Hipermarkety</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck421">
                                                    <label class="custom-control-label"
                                                           for="customCheck421">Spożywczaki</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck521">
                                                    <label class="custom-control-label"
                                                           for="customCheck521">Monopolowe</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>


                                <button class="btn btn-primary btn-lg w-100 mt-3" data-dismiss="modal" onclick="recomend()">Zapisz</button>
                            </div>

                        </div>
                    </div>
                </div>

                <h1 class="pt-5">Warte uwagi w okolicy:</h1>
                <p class="text-muted">Lista stworzona według Twoich preferencji</p>
                <ul class="list-group" style="font-size:120%;" id="recomends">
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00533, 50.03773)">
                        <i class="fas fa-cocktail"></i> Pewex PUB <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00573, 50.03731)">
                        <i class="fas fa-hotel"></i> Hotel amb <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00409, 50.03762)">
                        <i class="fa fa-landmark"></i> Muzeum Historii Miasta Rzeszowa <span
                                class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00492, 50.03736)">
                        <i class="fas fa-monument"></i> Pomnik Tadeusza Kościuszki <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00399, 50.03734)">
                        <i class="fa fa-landmark"></i> Ratusz <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00528, 50.03706)">
                        <i class="fa fa-landmark"></i> Urząd Miasta Rzeszowa <span
                                class="badge badge-primary">sprawdź</span>
                    </li>
                </ul>

                <ul class="list-group invisible" style="font-size:120%;" id="recomends2">
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00533, 50.03773)">
                        <i class="fas fa-cocktail"></i> Pewex PUB <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00338, 50.03797)">
                        <i class="fas fa-hotel"></i> Hotel pod ratuszem <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00625, 50.03746)">
                        <i class="fa fa-coffee"></i> Powoli cafe <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00564, 50.03735)">
                        <i class="fa fa-coffee"></i> Cukiernia wiedeńska <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00438, 50.03783)">
                        <i class="fas fa-apple-alt"></i>Pizzeria radość <span class="badge badge-primary">sprawdź</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" onclick="markPoint(22.00456, 50.0378)">
                        <i class="fas fa-apple-alt"></i>Zen sushi <span class="badge badge-primary">sprawdź</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-8" id="map" style="height: 490px;">
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

            var pokazDate = "Dzisiaj jest " + dni[dzienN] + ', ' + dzien + ' ' + miesiace[miesiac] + ' ' + rok + "<br>Godzina " + godzina + ':' + minuta + ':' + sekunda;
            document.getElementById("watch").innerHTML = pokazDate;
            setTimeout(zegarek, 1000);
        }
    </script>
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script>

        function markPoint(x, y)
        {

            map = new OpenLayers.Map("map");
            map.addLayer(new OpenLayers.Layer.OSM());

            var lonLat = new OpenLayers.LonLat(x,y)
                .transform(
                    new OpenLayers.Projection("EPSG:4326"),
                    map.getProjectionObject()
                );

            var zoom = 18;

            var markers = new OpenLayers.Layer.Markers("Markers");
            map.addLayer(markers);

            markers.addMarker(new OpenLayers.Marker(lonLat));

            map.setCenter(lonLat, zoom);
        }

        function start()
        {
            zegarek();
            markPoint(22.00489, 50.0375);
        }

        function recomend()
        {
            document.getElementById("recomends").outerHTML = "";

            var element2 = document.getElementById("recomends2");
            element2.classList.remove("invisible");
        }


    </script>
<?php
require_once (new PathProvider())->view('inc/footer');