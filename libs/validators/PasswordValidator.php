<?php


class PasswordValidator
{
    public function validate($str1, $str2)
    {
        if ($str1 != $str2)
        {
            return "Stringi nie są identyczne";
        }
        return true;
    }

    public function hashPassword($war1, $war2)
    {
        if ((!is_string($war1)) && (!is_string($war2)))
        {
            return "Hasło jest ok";
        }
        return true;
    }

}