
<?php
use App\BITM\SEIP129150\Birthday\Birthday;
include_once('../../../vendor/autoload.php');
$birthday=new Birthday();
$birthday->prepare($_GET);
$birthday=$birthday->veiw();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Birthday veiw</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body bgcolor="#00ffff">

<div class="container">
  <h2><?php echo $birthday['name']?></h2>
  <ul class="list-group">
    <table>
        <tr>
            <td>
                ID:
            </td>
            <td>
                <?php echo $birthday['id']?>
            </td>
        </tr>
        <tr>
            <td>name :</td>
            <td><?php echo $birthday['name']?></td>
        </tr>

        <tr>
            <td>birthday :</td>
            <td>
                <?php
                $birthdayTime=strtotime($birthday['birthday']);
                $birthdayFormat=date("d-m-y",$birthdayTime);
                echo $birthdayFormat;


                ?></td>
        </tr>
        <tr>
            <td>
            <a href="index.php" class="btn btn-info" role="button">List Veiw</a>
            </td>
            <td>
            <a href="create.php" class="btn btn-primary" role="button">Add new birthday</a>
            </td>
        </tr>

    </table>
  </ul>
</div>

</body>
</html>
