<?php
/**
 * Created by Gabriel Ślawski
 * Date: 17.11.18
 * Time: 14:04
 */

namespace app\core\validate\traits;

/**
 * Trait EmptyValidator
 * @package app\core\validate\traits
 */
trait EmptyValidator
{
    /**
     * validate email address
     */
    public function notEmpty(): bool
    {
        if(!isset($this->data->{$this->currentCheckingDataName})){
            $this->errors[] = 'Otrzymane dane są niekompletne!';

            return false;
        }

        if (empty($this->data->{$this->currentCheckingDataName})) {
            $this->errors[] = 'Pole ' . $this->currentCheckingDataName . ' nie może być puste!';

            return false;
        }

        return true;
    }
}