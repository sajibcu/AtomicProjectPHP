<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Book\Book;
use App\BITM\SEIP129150\Book\Message;
$book=new Book();
$book->prepare($_POST);
$book->update();