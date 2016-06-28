<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;
use App\BITM\SEIP129150\Book\Utility;

//Utility::dd($_FILES);
if((isset($_FILES['image']))&&!empty($_FILES['image']['name'])){

    $imageName=time().$_FILES['image']['name'];
    $imageLocation=$_FILES['image']['tmp_name'];
    move_uploaded_file($imageLocation,'../../../resources/images/'.$imageName);
    $_POST['imageName']=$imageName;

    $image=new ImageLoader();
    $image->prepare($_POST);
    $image->store();


}
else 
{
    Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccess!</strong> Data has not been stored successfully.
</div>");
    Utility::redirect('index.php');
}

?>

