<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
use App\BITM\SEIP129150\Book\Utility;
$mulhoby=new Hobby();
$mulhoby->mutipleDelete($_POST['mark']);


?>