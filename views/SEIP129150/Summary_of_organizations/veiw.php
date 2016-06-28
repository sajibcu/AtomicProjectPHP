
<?php
use App\BITM\SEIP129150\Summary_of_organizations\Summary_of_organization;
include_once('../../../vendor/autoload.php');
$org=new Summary_of_organization();
$org->prepare($_GET);
$org=$org->veiw();

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
  <h2><?php echo $org['name']?></h2>
  <ul class="list-group">
    <table>
        <tr>
            <td>
                ID:
            </td>
            <td>
                <?php echo $org['id']?>
            </td>
        </tr>
        <tr>
            <td>Organization Name:</td>
            <td><?php echo $org['name']?></td>
        </tr>
        <tr>
            <td>Organization Summary:</td>
            <td><?php echo $org['summary']?></td>
        </tr>
        <tr>
            <td>
            <a href="index.php" class="btn btn-info" role="button">List Veiw</a>
            </td>
            <td>
            <a href="create.php" class="btn btn-primary" role="button">Add new Organization</a>
            </td>
        </tr>

    </table>
  </ul>
</div>

</body>
</html>
