<?php
/**
 * Created by Gabriel Ślawski
 * Date: 09.11.18
 * Time: 11:13
 */

namespace app\core;

use app\core\autoload\PathProvider;
use app\core\http\Request;
use app\models\Role;

/**
 * Class Controller
 * Base controllers class.
 *
 * @package app\core
 */
class Controller extends Request
{
    /**
     * @var array $errors
     */
    public $errors = [];

    /**
     * @var string | Auth $auth;
     */
    public $auth = Auth::class;

    /**
     * @var string | Role $role
     */
    public $role = Role::class;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->sanitizeRequest();

        /** passing request as object */
        $this->request = (object)$this->request;

        $this->auth = new $this->auth;
        $this->role = new $this->role;
    }

    /**
     * Protection from controllers without index action
     */
    public function index()
    {
        $this->view('index');
    }

    /**
     * @param string     $view
     * @param array|null $data
     */
    public function view(string $view, array $data = null)
    {
        $path = (new PathProvider())->view($view);
        if (!file_exists($path)) {
            die('Widok pliku nie istnieje!');
        }

        $data['errors'] = $this->errors;

        $data = (object)$data;
        $auth = $this->auth;

        require_once $path;
    }
}