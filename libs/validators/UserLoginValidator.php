<?php


class UserLoginValidator
{
    public function isLoginDataExist($data)
    {
        if( (!isset($data['login'])) || (!isset($data['password1'])) )
        {
            return false;
        }
        return true;
    }

}