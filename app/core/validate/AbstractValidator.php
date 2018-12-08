<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:25
 */

namespace app\core\validate;

use stdClass;

/**
 * Class AbstractValidator
 * @package app\core\validate
 */
abstract class AbstractValidator
{
    /**
     * @var array $data
     */
    protected $data = [];

    /**
     * @var array $requirements
     */
    protected $requirements = [];

    /**
     * @var array $errors - contains data validate errors
     */
    protected $errors = [];

    /**
     * @var null|string $currentCheckingDataName
     */
    protected $currentCheckingDataName = null;

    /**
     * AbstractValidator constructor.
     * @param stdClass $data
     * @param array    $requirements
     */
    public function __construct(stdClass $data, array $requirements)
    {
        $this->data = $data;
        $this->requirements = $requirements;
    }

    /**
     * @return Validatable
     */
    public function validate(): Validatable
    {
        foreach ($this->requirements as $item) {
            if (method_exists($this, $item)) {
                $this->currentCheckingDataName = $item;
                $this->{$item}();
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}