<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Summary_of_organizations\Summary_of_organization;
use APP\BITM\SEIP129150\Book\Message;
$org=new Summary_of_organization();
$org->prepare($_POST);
$org->update();