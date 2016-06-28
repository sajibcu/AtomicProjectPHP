<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
$hobby=new Hobby();
$hobby->prepare($_GET);
$hobby->recover();