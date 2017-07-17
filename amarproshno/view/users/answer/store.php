<?php
include_once ("../../../vendor/autoload.php");
use App\utility\Utility;
use App\answer\Answer;

$obj = new Answer();
$obj->setData($_POST)->storeAnswer();