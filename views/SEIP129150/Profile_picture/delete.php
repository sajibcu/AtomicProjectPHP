<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;


$pp= new ImageLoader();
$pp->prepare($_GET);
$singleInfo=$pp->veiw();
unlink($_SERVER['DOCUMENT_ROOT'].'/AtomicProject/resources/images/'.$singleInfo['imageName']);
$pp->delete();


?>