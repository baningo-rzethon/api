<?php

/**
 * Created by Gabriel Ślawski
 * Date: 10.11.18
 * Time: 15:45
 */

use app\core\Controller;

/**
 * Class Pages
 */
class Pages extends Controller
{
    /**
     * Main page
     */
    public function index()
    {
        $this->view('index');
    }
}