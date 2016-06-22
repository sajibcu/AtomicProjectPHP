<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Email\Email;
$email=new Email();
$email->multipleRecover($_POST['mark']);