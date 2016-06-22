<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_pcture\Profile_pcture;
if((isset($_FILES['image']))&&!empty($_FILES['image']['name'])){

    $imageName=time().$_FILES['image']['name'];
    $imageLocation=$_FILES['image']['tmp_name'];
    move_uploaded_file($imageLocation,'../../../resources/images'.$imageName);
    $_POST['imageName']=$imageName;



}

$image=new Profile_pcture();
$image->prepare($_POST);
$image->store();
?>

