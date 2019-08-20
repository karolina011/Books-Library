<?php


class CheckboxValidator
{
    public function validate($data)
    {
        if (!isset($data))
        {
            return "Ceckbox nie jest zaznaczony";
        }
        return true;
    }
}