<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Education_level\Education_level;
use App\BITM\SEIP129150\Book\Utility;
use App\BITM\SEIP129150\Book\Message;
if(isset($_POST['name'])&&(!empty($_POST['name']))&&$_POST['level']) {
   $education=new Education_level();
    $education->prepare($_POST);
    $education->store();
}
else
{
    Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccesssss!</strong> Data has not been stored successfully.
</div>");
    Utility::redirect('index.php');
}
