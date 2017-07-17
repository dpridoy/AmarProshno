<?php
include_once('../../vendor/autoload.php');
use App\utility\Utility;
use App\users\Users;

$obj = new Users();
$obj->matchLoginData($_POST);

