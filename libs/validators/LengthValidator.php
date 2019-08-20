<?php


class LengthValidator implements Validator
{
    protected $min;
    protected $max;

    public function __construct($min = null, $max = null)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function validate($string)
    {
        if ($this->min == null && $this->max == null) {
            return true;
        }

        if ($this->max != null && $this->isStringTooLength($string)) {
            return "This string is too length";
        }

        if ($this->min != null && strlen($string) < $this->min) {
            return "This string is too short";
        }

        return true;
    }

    public function isStringTooLength($string)
    {
        if (strlen($string) > $this->max) {
            return true;
        }
        return false;
    }
}