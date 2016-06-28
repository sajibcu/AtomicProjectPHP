
<?php
use App\BITM\SEIP129150\City\City;
include_once('../../../vendor/autoload.php');
$city=new City();
$city->prepare($_GET);
$city=$city->veiw();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Veiw</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body bgcolor="#00ffff">

<div class="container">
    <h2 style="color: chartreuse"><?php echo $city['name']?></h2>
    <ul class="list-group">
        <table>
            <tr>
                <td>
                    ID:
                </td>
                <td>
                    <?php echo $city['id']?>
                </td>
            </tr>
                <tr>
                <td> Name:</td>
                <td>
                    <?php echo $city['name']?>
                </td>
            </tr>
            <tr>
                <td>city :</td>
                <td><?php echo $city['city']?></td>
            </tr>
            <tr>
                <td>
                    <a href="index.php" class="btn btn-info" role="button">List Veiw</a>
                </td>
                <td>
                    <a href="create.php" class="btn btn-primary" role="button">Add new city</a>
                </td>
            </tr>

        </table>
    </ul>
</div>

</body>
</html>
