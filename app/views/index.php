<?php

use app\core\autoload\PathProvider;

require_once (new PathProvider())->view('inc/header');
require_once (new PathProvider())->view('inc/flash');
?>
home

<?php
require_once (new PathProvider())->view('inc/footer');