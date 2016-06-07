<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
$book=new Hobby();
echo $book->update();