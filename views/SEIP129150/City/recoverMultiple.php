<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\City\City;
$city=new City();
$city->multipleRecover($_POST['mark']);