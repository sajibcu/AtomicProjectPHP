<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Birthday\Birthday;
use App\BITM\SEIP129150\Birthday\Message;
use App\BITM\SEIP129150\Birthday\Utility;


$birthday=new Birthday();
$albirthday=$birthday->index();
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
<!--<body background="birthday.jpg">-->
<body>
<div class="container">
    <h1>birthday List</h1>
    <a href="create.php" class="btn btn-info" role="button">Add new birthday</a>
    <a href="trashVeiw.php" class="btn btn-primary" role="button">Trash List</a>
    <select>
        <option value="" style="display: none"> select</option>
        <option value="ten">10</option>
        <option value="fifty">50</option>
        <option value="hundred">100</option>
    </select>
    <br>
    <div id="message">
        <?php echo Message::message()?>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
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
                   Birthday
                </td>
                <td>
                    Action
                </td>
            </tr>
            </thead>
            <tbody>
            <?php
            $sl=1;
            foreach ($albirthday as $birthday) {

            ?>
            <tr>
                <td><?php echo  $sl?></td>
                <td> <?php echo $birthday['id']?></td>
                <td> <?php echo $birthday['name']?></td>
                <td> <?php echo $birthday['birthday']?></td>
                <td>
            <a href="veiw.php?id=<?php echo $birthday['id']?>" class="btn btn-info" role="button">View</a>
            <a href="edit.php?id=<?php echo $birthday['id']?>" class="btn btn-primary" role="button">Edit</a>
            <a href="delete.php?id=<?php echo $birthday['id']?>" class="btn btn-danger" role="button">Delete</a>
            <a href="trash.php?id=<?php echo $birthday['id']?>" class="btn btn-success" role="button">Trash</a>
                </td>
            </tr>

            </tbody>
            <?php $sl++; } ?>
        </table>
    </div>
</div>
<script>
    $('#message').show().delay(3000).fadeOut();

</script>

</body>
</html>
