<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
use App\BITM\SEIP129150\Book\Message;
use App\BITM\SEIP129150\Book\Utility;
$hobby=new Hobby();
$alhobby=$hobby->trashedveiw();
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
    <h1>Hobby Trashed list</h1>
    <a href="index.php" class="btn btn-info" role="button">View all Hobby list</a>
    <form method="post" action="multipleRecover.php" id="multiple">
        <input type="submit" value="Multiple Recover" class="btn-primary">
    <input type="button" value="Multipule Delect" class="btn-danger" id="delect">
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <td>
                    Select
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
                    Hobby
                </td>
                <td>
                    Action
                </td>
            </tr>
            </thead>
            <tbody>
            <?php
            $sl=1;
            foreach ($alhobby as $hobby) {

            ?>
            <tr>
                <td><input type="checkbox" name="mark[]" value="<?php echo  $hobby['id']?>" ></td>
                <td><?php echo  $sl?></td>
                <td> <?php echo $hobby['id']?></td>
                <td> <?php echo $hobby['name']?></td>
                <td> <?php echo $hobby['hobby']?></td>
                <td>
                    <a href="delete.php?id=<?php echo $hobby['id']?>" class="btn btn-danger" role="button">Delete</a>
                    <a href="recover.php?id=<?php echo $hobby['id']?>" class="btn btn-success" role="button">recover</a>
                </td>
            </tr>

            </tbody>
            <?php $sl++; } ?>
        </table>
        </form>
    </div>
</div>
<script>
    $('#delect').on('click',function () {
        document.forms[0].action="multipleDelect.php";
        $('#multiple').submit();


    })
</script>

</body>
</html>
