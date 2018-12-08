<?php
/**
 * Created by Gabriel Ślawski
 * Date: 09.11.18
 * Time: 11:13
 */

namespace app\core;

use app\core\autoload\PathProvider;
use app\core\http\Url;

/**
 * Class Core
 * Control and manage of URL, controllers and actions.
 *
 * @package app\core
 */
class Core
{
    /**
     * @var string $controller
     */
    protected $controller = null;

    /**
     * @var string $action
     */
    protected $action = null;

    /**
     * @var array $params
     */
    protected $params = [];

    /**
     * @var null|Url $url
     */
    public $url = null;

    /**
     * default controller class name
     */
    const DEFAULT_CONTROLLER = 'Pages';

    /**
     * default controller action name
     */
    const DEFAULT_CONTROLLER_ACTION = 'index';

    /**
     * 1. Get parametrized url and store it in var
     * 2. Make controller object - if pointed controller doesn't exist call default controller
     * 3. Try to call pointed action - if fail call index action of pointed controller
     *
     * Important thing: unset controller name and action it'll help with params passing
     */
    public function init()
    {
        $this->url = (new Url())->getParametrized();
        $this->ensureController();
        unset($this->url[0]);
        $this->action = $this->url[1] ?? 'index';
        unset($this->url[1]);
        $this->callWithParamsIfMethodExists();
    }

    /**
     * Method'll include controller file.
     * If pointed controller doesn't exists it'll provide default controller.
     */
    private function ensureController()
    {
        if (!$this->url[0] || !file_exists((new PathProvider())->controller(ucwords($this->url[0])))) {
            $controller = static::DEFAULT_CONTROLLER;
            require_once (new PathProvider())->controller($controller);
            $this->controller = new $controller;

            return;
        }

        $controller = ucwords($this->url[0]);
        require_once (new PathProvider())->controller($controller);
        $this->controller = new $controller;

        return;
    }

    /**
     * It'll call controller action.
     * If action doesn't exists it'll call index.
     */
    private function callWithParamsIfMethodExists()
    {

        if (!$this->action || !method_exists($this->controller, $this->action)) {
            $this->action ='index';
            $this->callAction('index');

            return;
        }

        $this->callAction();
    }

    /**
     * Call directly pointed controller action.
     */
    private function callAction()
    {
        $this->params = $this->url ? array_values($this->url) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
}