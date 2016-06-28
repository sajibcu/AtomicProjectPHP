<?php
session_start();
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;
use App\BITM\SEIP129150\Book\Message;
$pp=new ImageLoader();
$ppicture=$pp->trashed();

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/bootstrap/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!--  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
</head >
<!--<body background="book.jpg">-->
<body>
<div class="container">
    <h1>Profile Picture Trashed List</h1>
    <a href="index.php" class="btn btn-info" role="button">View all Picture list</a>
    <form method="post" action="multipleRecover.php" id="multiple">
        <input type="submit" value="Multiple Recover" class="btn btn-primary">
        <input type="button" value="Multipule Delect" class="btn btn-success" id="delect">
        <br>
    <div class="table-responsive">
        <table class="table">
            <thead>

            <tr>
                <td>
                    SELECT
                </td>
                <td>
                    SL#
                </td>
                <td>
                    ID
                </td>
                <td>
                    Name
                </td>
                <td>
                    Picture
                </td>
            </tr>
            </thead>
            <tbody>

            <?php
            $sl=1;
            foreach ($ppicture as $pic) {

            ?>
            <tr>
                <td><input type="checkbox" name="mark[]" value="<?php echo  $pic['id']?>" ></td>
                <td><?php echo  $sl?></td>
                <td> <?php echo $pic['id']?></td>
                <td> <?php echo $pic['name']?></td>
                <td> <img src="../../../resources/images/<?php echo $pic["imageName"]?>" alt height="100px" width="100px"></td>
                <td>

                    <a href="recover.php?id=<?php echo $pic['id']?>" class="btn btn-success" role="button">recover</a>
                    <a href="delete.php?id=<?php echo $pic['id']?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>

            </tbody>
            <?php $sl++; } ?>
        </table>
    </div>

        <script>
            $('#delect').on('click',function () {
                document.forms[0].action="multipleDelect.php";
                $('#multiple').submit();


            })
        </script>
</div>

</body>
</html>
