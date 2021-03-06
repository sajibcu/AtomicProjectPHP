<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Summary_of_organizations\Summary_of_organization;
use App\BITM\SEIP129150\Book\Message;
use App\BITM\SEIP129150\Book\Utility;
$org=new Summary_of_organization();
$trashorg=$org->trashed();
//var_dump($trashorg);
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
<!--<body background="org.jpg">-->
<body>
<div class="container">
    <h2>Trashed org List</h2>

    <a href="index.php" class="btn btn-info" role="button">View all org title</a>
    <form action="recoverMultiple.php" method="post" id="multiple">
        <button type="submit" class="btn btn-info">Recover Selected</button>
        <button type="button" class="btn btn-primary" id="delete">Delete all Selected</button>
        <br><br>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td>SELECT</td>
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
                        Discription
                    </td>
                    <td>
                        Action
                    </td>
                </tr>
                </thead>
                <tbody>
                <?php
                $sl=1;
                foreach ($trashorg as $org) {

                ?>
                <tr>
                    <td><input type="checkbox" name=mark[] value="<?php echo $org['id'] ?>"></td>
                    <td><?php echo  $sl?></td>
                    <td> <?php echo $org['id']?></td>
                    <td> <?php echo $org['name']?></td>
                    <td> <?php echo $org['summary']?></td>
                    <td>
                        <a href="recover.php?id=<?php echo $org['id']?>" class="btn btn-info" role="button">Recover</a>
                        <a href="delete.php?id=<?php echo $org['id']?>" class="btn btn-primary" role="button">Delete</a>
                    </td>
                </tr>

                </tbody>
                <?php $sl++; } ?>
            </table>
    </form>
</div>
</div>

<script>
    $('#delete').on('click',function(){
        document.forms[0].action="deleteMultiple.php";
        $('#multiple').submit();
    });
</script>

</body>
</html>
