<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Summary_of_organizations\Summary_of_organization;
$org=new Summary_of_organization();
$org->multipleRecover($_POST['mark']);