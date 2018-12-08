<?php

use app\core\autoload\PathProvider;

require_once (new PathProvider())->view('inc/header');
require_once (new PathProvider())->view('inc/navs/dashboard');
require_once (new PathProvider())->view('inc/flash');
?>
    <div class="jumbotron">
        <h1 class="display-3">Hello, world!</h1>
        <p class="lead">You have been logged into! Now you can use dashboard.</p>
        <hr class="my-4">
        <p>All hidden functionalities are available here.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/pages" role="button">Back to the main page</a>
        </p>
    </div>

<?php
require_once (new PathProvider())->view('inc/footer');
