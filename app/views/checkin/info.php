<?php

use app\core\autoload\PathProvider;

require_once (new PathProvider())->view('inc/header');
require_once (new PathProvider())->view('inc/flash');
?>
    <div class="container-fluid bg-light" style="min-height: 1000px;">
        <div class="row pt-5">
            <div class="col-md-6 pl-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/POL_Rzesz%C3%B3w_COA.svg/800px-POL_Rzesz%C3%B3w_COA.svg.png"
                     class="img-fluid" style="max-height: 200px;">
            </div>
            <div class="col-md-6 text-right pr-5 pt-4">
                <span class="text-primary display-3 ">#rzeTour</span>
                <p class="text-muted">Informacje w zasięgu Twojej ręki</p>
            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>
<?php
require_once (new PathProvider())->view('inc/footer');