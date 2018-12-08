<?php
/**
 * Created by Gabriel Ślawski
 * Date: 09.11.18
 * Time: 10:53
 */

use app\core\autoload\Autoloader;
use app\core\Core;

/**
 * require config and autoloader file
 */
require_once 'config/config.php';
require_once 'core/autoload/Autoloader.php';

/**
 * start new session
 */
session_start();

/**
 * Init auto loading
 */
$loader = new Autoloader();
$loader->init();

/**
 * Init Core class
 */
(new Core())->init();