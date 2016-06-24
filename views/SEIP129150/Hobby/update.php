<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
use App\BITM\SEIP129150\Book\Utility;
$hobby=new Hobby();
//Utility::dd($_POST['hobby']);
$allhobby=implode(",",$_POST['hobby']);
//Utility::dd($allhobby);
$_POST['hobby']=$allhobby;
$hobby->prepare($_POST);
$hobby->update();

