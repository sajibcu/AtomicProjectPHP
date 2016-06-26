<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Birthday\Birthday;
$birthday=new Birthday();
$birthday->multipleDelect($_POST['mark']);