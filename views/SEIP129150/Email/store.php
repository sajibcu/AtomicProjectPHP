<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Email\Email;
if(isset($_POST['email'])&&(!empty($_POST['email']))) {
    $email = new Email();
    $email->prepare($_POST);
    $email->store();
}
else
{
    echo "insert some data";
}
