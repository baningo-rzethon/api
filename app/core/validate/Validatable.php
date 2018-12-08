<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:12
 */

namespace app\core\validate;

use stdClass;

/**
 * Interface Validatable
 * @package app\core\validate
 */
interface Validatable
{
    /**
     * Validatable constructor.
     * Data and requirements are provided by constructor.
     *
     * @param stdClass $data
     * @param array $requirements
     */
    public function __construct(stdClass $data, array $requirements);

    /**
     * It returns array of errors from getErrors()
     *
     * @return Validatable
     */
    public function validate(): Validatable;

    /**
     * It returns array of errors.
     *
     * @return array
     */
    public function getErrors(): array;
}