<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Birthday\Birthday;
$book=new Birthday();
echo $book->update();