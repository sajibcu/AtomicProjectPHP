<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;
use  App\BITM\SEIP129150\Book\Utility;
$image=new ImageLoader();
$image->prepare($_GET);
$singleImage=$image->veiw();

//Utility::dd($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Veiw single</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body bgcolor="#00fff5">

<div class="container">
    <div style="color: #269abc ">
    <h2 align="center" ><?php echo $singleImage['name']?></h2>
        </div>
    <ul class="list-group">
        <table>
            <tr>
                <td>
                    ID:
                </td>
                <td>
                    <?php echo $singleImage['id']?>
                </td>
            </tr>
            <tr>
                <td>Image :</td>
                <td> <img src="../../../resources/images/<?php echo $singleImage["imageName"]?>" alt height="200px" width="200px"></td>
            </tr>
            <tr>
                <td>
                <?php echo "</hr>"?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="index.php" class="btn btn-info" role="button">List Veiw</a>
                </td>
                <td>
                    <a href="create.php" class="btn btn-primary" role="button"> Add new Profile Picture</a>
                </td>
            </tr>

        </table>
    </ul>
</div>

</body>
</html>
