<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Birthday\Birthday;
use App\BITM\SEIP129150\Book\Message;
$birthday=new Birthday();
$birthday->prepare($_POST);
$birthday->update();