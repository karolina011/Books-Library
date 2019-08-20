<?php

//validators

if(session_id() == '' || !isset($_SESSION)) {

    session_start();
}

require_once "libs/validators/Validator.php";

require_once  "libs/validators/UserLoginValidator.php";
require_once  "libs/validators/LengthValidator.php";
require_once  "libs/validators/EmailValidator.php";
require_once  "libs/validators/LoginValidator.php";
require_once "libs/validators/PasswordValidator.php";
require_once "libs/validators/CheckboxValidator.php";

require_once 'libs/Bootstrap.php';
require_once 'libs/Session.php';
require_once 'libs/View.php';
require_once 'libs/Controller.php';
require_once 'libs/Model.php';
require_once 'libs/Database.php';
require_once 'config.php';

$app = new Bootstrap();