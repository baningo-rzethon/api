<?php
/**
 * Created by Gabriel Ślawski
 * Date: 17.11.18
 * Time: 11:43
 */

use app\core\Controller;

/**
 * Class Dashboard
 * @package app\controllers
 */
class Dashboard extends Controller
{
    /**
     * Dashboard constructor.
     */
    public function __construct()
    {
        parent::__construct();

        if (!$this->auth->isLogged()) {
            return $this->redirect('pages');
        }

        return;
    }

    /**
     * /dashboard
     */
    public function index()
    {
        $this->view('dashboard/index');
    }
}