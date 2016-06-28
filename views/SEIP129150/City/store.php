<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\City\City;
use App\BITM\SEIP129150\Book\Utility;
use App\BITM\SEIP129150\Book\Message;
if(isset($_POST['name'])&&(!empty($_POST['name']))&&$_POST['city']!="select") {
   $city=new  City();
    $city->prepare($_POST);
    $city->store();
}
else
{
    Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccess!</strong> Data has not been stored successfully.
</div>");
    Utility::redirect('index.php');
}
