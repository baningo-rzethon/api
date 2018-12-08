<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 18:46
 */

namespace app\core;

use stdClass;

/**
 * Class FormModel
 * @package app\core
 */
class FormModel
{
    /**
     * @var null | stdClass $data
     */
    protected $data = null;

    /**
     * RegisterForm constructor.
     * @param stdClass|null $request
     */
    public function __construct(stdClass $request = null)
    {
        $this->data = $request;
    }
}