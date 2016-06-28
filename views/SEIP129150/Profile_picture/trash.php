<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;
use  App\BITM\SEIP129150\Book\Utility;
$image=new ImageLoader();
$image->prepare($_GET);
$image->trash();