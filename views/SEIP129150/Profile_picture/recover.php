<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;
$image=new ImageLoader();
$image->prepare($_GET);
$image->recover();