<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Book\Utility;
use App\BITM\SEIP129150\Profile_picture\ImageLoader;

$profilePicture= new ImageLoader();
 $profilePicture->prepare($_POST);
$singleInfo=$profilePicture->veiw();

if((isset($_FILES['image'])) && (!empty($_FILES['image']['name']))){
    $imageName= time(). $_FILES['image']['name'];
    $temporary_location= $_FILES['image']['tmp_name'];
    unlink($_SERVER['DOCUMENT_ROOT'].'/AtomicProject/resources/images/'.$singleInfo['imageName']);
    move_uploaded_file($temporary_location,'../../../resources/images/'.$imageName);
    $_POST['imageName']=$imageName;

    $profilePicture= new ImageLoader();
    $profilePicture->prepare($_POST);
    $profilePicture->update();


}
else
{
    Message::message("<div class=\"alert alert-info\"> <strong>Updated!</strong> Data has not been updated successfully.</div>");
    Utility::redirect("index.php");
}


//Utility::d($_POST);
