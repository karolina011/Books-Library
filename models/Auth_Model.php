<?php

class Auth_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run($data)
    {

        $query = $this->db->prepare('SELECT * FROM users WHERE login = :login ');
        $query->execute(array(
            ':login' => $data['login']
        ));

        $sth = $query->fetch();


        if (empty($sth)) {
            return false;
        }


        if (password_verify($data['password1'], $sth['password'])) {
            Session::set('user', $sth);
            return true;
        }
        return false;


    }

    public function isLoginExistInDatabase($login)
    {
        $query = $this->db->prepare('SELECT login FROM users WHERE login = :login ');
        $query->execute(array(
            ':login' => $login
        ));

        $count = $query->rowCount();

        if ($count > 0) {
            return "Podany login już istnieje";
        }

        return true;
    }

    public function create($data)
    {

        $haslo_hash = password_hash($data['password1'], PASSWORD_DEFAULT);

        try {
            $query = $this->db->prepare('INSERT INTO users VALUES (null, :login, :password, :email, :plec, :rola )');
            $query->execute(array(
                ':login' => $data['login'],
                ':password' => $haslo_hash,
                ':email' => $data['email'],
                ':plec' => $data['gender'],
                ':rola' => $data['role']
            ));
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}