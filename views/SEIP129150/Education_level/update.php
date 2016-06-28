<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Education_level\Education_level;
$education=new Education_level();
$education->prepare($_POST);
$education->update();