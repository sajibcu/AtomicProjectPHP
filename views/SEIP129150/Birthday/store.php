<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Birthday\Birthday;
use App\BITM\SEIP129150\Book\Utility;
use App\BITM\SEIP129150\Book\Message;
if(isset($_POST['name'])&&(!empty($_POST['name']))) {
    $birthday = new Birthday();
    $birthday->prepare($_POST);
    $birthday->store();
}
else
{
    Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccess!</strong> Data has not been stored successfully.
</div>");
    Utility::redirect('index.php');
}
