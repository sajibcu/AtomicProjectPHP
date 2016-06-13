<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Book\Book;
use App\BITM\SEIP129150\Book\Utility;
use App\BITM\SEIP129150\Book\Message;
if(isset($_POST['title'])&&(!empty($_POST['title']))) {
    $book = new Book();
    $book->prepare($_POST);
    $book->store();
}
else
{
    Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccess!</strong> Data has not been stored successfully.
</div>");
    Utility::redirect('index.php');
}
