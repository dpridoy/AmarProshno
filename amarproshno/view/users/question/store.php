<?php
include_once ("../../../vendor/autoload.php");
use App\utility\Utility;
use App\question\Question;

$obj = new Question();
$obj->setData($_POST)->storeQuestion();

