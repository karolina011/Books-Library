<?php


class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_NAME, DB_PASS, DB_USER, DB_HOST);
    }
}