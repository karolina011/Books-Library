<?php

class LoginValidator implements Validator
{
    public function validate($login)
    {
        if (!ctype_alnum($login))
        {
            return "Nieorawidłowe znaki";
        }
        return true;
    }
}