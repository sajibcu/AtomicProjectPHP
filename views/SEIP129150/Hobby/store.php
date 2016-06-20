<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
$aryhobby=$_POST['hobby'];
$coma_separated_string=implode(",",$aryhobby);
$_POST['hobby']=$coma_separated_string;
$hobby=new Hobby();
$hobby->prepare($_POST);
$hobby->store();

