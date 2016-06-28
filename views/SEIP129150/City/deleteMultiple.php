<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\City\City;
$city=new City();
$city->multipleDelect($_POST['mark']);