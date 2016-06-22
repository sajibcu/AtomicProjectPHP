<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Email\Email;
$email=new Email();
$email->prepare($_GET);
$email->recover();