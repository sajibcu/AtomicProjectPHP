<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Book\Book;
if(isset($_POST['title'])&&(!empty($_POST['title']))) {
    $book = new Book();
    $book->prepare($_POST);
    $book->store();
}
else
{
   echo "insert some data";
}
