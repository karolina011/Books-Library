<?php

class Validator
{
    public $ok = true;

    public function login()
    {

    }

    public function email()
    {
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) || ($emailB != $email))
        {
            $_SESSION['errEmail'] = "Nieprawidłowy adres email";
        }


    }

    public function password()
    {

    }

    public function gender()
    {

    }

    public function statute()
    {

    }


}