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

    public function map()
    {
        echo '

        <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=3+Maja+4,+35-069+Rzeszów,+Polska&destination=3+Maja+28,+35-025+Rzeszów,+Polska&mode=walking&key=AIzaSyAI4fQkvZHWLGT4APtAVRzDftXHtQQA2so" allowfullscreen></iframe>
        
        
        ';
    }
}