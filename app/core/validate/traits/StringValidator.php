<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:45
 */

namespace app\core\validate\traits;

/**
 * Trait EmailValidator
 * @package app\core\validate\traits
 */
trait StringValidator
{
    /**
     * @param int $min
     * @param int $max
     */
    public function stringValidation(int $min, int $max)
    {
        $string = $this->data->{$this->currentCheckingDataName} ?? null;
        if (strlen($string) < $min || strlen($string) > $max) {
            $this->errors[] = 'Pole ' . $this->currentCheckingDataName . ' musi mieć minimanie ' . $min . ' i maksymalnie ' . $max . ' znaków.';
        }
    }
}