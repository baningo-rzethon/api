<?php

use app\core\autoload\PathProvider;

require_once (new PathProvider())->view('inc/header');
require_once (new PathProvider())->view('inc/flash');
?>
    <div class="container-fluid bg-light" style="min-height: 1000px;">
        <div class="row">
            <div class="col-md-12 text-center pt-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/POL_Rzesz%C3%B3w_COA.svg/800px-POL_Rzesz%C3%B3w_COA.svg.png"
                     class="img-fluid" style="max-height: 200px;">
            </div>
            <div class="col-md-12 display-4 text-center pt-5">
                Zaloguj się na swoje konto aplikacji <span class="text-primary">#rzeTour</span>,<br>
                a następnie zeskanuj kod, aby otrzymać informacje!
            </div>

            <div class="col-md-12 text-center pt-5 mt-5"><br><br>
                <p class="text-muted">Pobierz aplikację przez:</p>
                <img src="https://www.gstatic.com/android/market_images/web/play_prism_hlock_2x.png" class="img-fluid"
                     style="max-height: 50px;">
            </div>
        </div>
    </div>
<?php
require_once (new PathProvider())->view('inc/footer');