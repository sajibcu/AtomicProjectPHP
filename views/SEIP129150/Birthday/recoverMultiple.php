<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Birthday\Birthday;
$birthday=new Birthday();
$birthday->multipleRecover($_POST['mark']);