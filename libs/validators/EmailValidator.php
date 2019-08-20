<?php


class EmailValidator implements Validator
{
    public function validate($email)
    {
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) || ($emailB != $email))
        {
            return "Nieprawidłowy email";
        }
        return true;
    }
}