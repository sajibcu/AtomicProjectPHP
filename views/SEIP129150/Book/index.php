<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Book\Book;
$book=new Book();
echo "<pre>";
echo var_dump($book->index());
echo "</pre>";