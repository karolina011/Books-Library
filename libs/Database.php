<?php

require_once 'config.php';

class Database extends PDO
{
    public function __construct($dbType, $dbName, $dbPass, $dbUser, $dbHost)
    {
        parent::__construct($dbType.':host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPass);
    }
}