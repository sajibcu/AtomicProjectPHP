<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
use App\BITM\SEIP129150\Book\Utility;

//Utility::dd($_GET);
$hobby=new Hobby();
$hobby->prepare($_GET);
$hobby->trash();