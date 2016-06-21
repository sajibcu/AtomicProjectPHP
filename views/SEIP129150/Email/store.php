<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Email\Email;
use App\BITM\SEIP129150\Book\Message;
use App\BITM\SEIP129150\Book\Utility;
if(isset($_POST['email'])&&(!empty($_POST['email']))) {
    $email = new Email();
    $email->prepare($_POST);
    $email->store();
}
else
{

    Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccess!</strong> Data has not been stored successfully.
</div>");
    Utility::redirect('index.php');
}

