<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Summary_of_organizations\Summary_of_organization;
use App\BITM\SEIP129150\Book\Utility;
use App\BITM\SEIP129150\Book\Message;
if(isset($_POST['name'])&&(!empty($_POST['name']))) {
    $org = new Summary_of_organization();
//    Utility::dd($_POST);
    $org->prepare($_POST);
    $org->store();
}
else
{
    Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccess!</strong> Data has not been stored successfully.
</div>");
    Utility::redirect('index.php');
}
