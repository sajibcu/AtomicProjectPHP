<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Book\Book;
$book=new Book();
$book->multipleDelect($_POST['mark']);