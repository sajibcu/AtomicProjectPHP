<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;

$profilePicture= new ImageLoader();
$profilePicture->prepare($_GET);
$singleInfo=$profilePicture->veiw();


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Picture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Edit Profile</h2>
    <form role="form" action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $singleInfo['id']?>">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" required  placeholder="Enter your name" name="name" value="<?php echo $singleInfo['name']?>">
        </div>
        <div class="form-group">
            <label for="pwd">Upload file:</label>
            <input type="file"  required class="form-control" name="image">
            <img src="../../../Resources/Images/<?php echo $singleInfo['imageName']?>" alt="image" height="100px" width="100px" class="img-responsive">
            <?php echo $singleInfo['imageName']?>
        </div>

        <input type="submit" class="btn btn-default" value="Submit">
    </form>
</div>

</body>
</html>


