<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Summary_of_organizations\Summary_of_organization;
use App\BITM\SEIP129150\Book\Message;
$org=new Summary_of_organization();
$org->prepare($_GET);
$singleItem=$org->veiw();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>org</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../Resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../Resources/bootstrap/js/bootstrap.js">
</head>
<body>

<div class="container">
    <h2>Atomic Project- Organization</h2>
    <form role="form" action="update.php" method="post">
        <div class="form-group">
            <label>Update Organization Name:</label>
            <input type="hidden" name="id"   value="<?php echo $singleItem['id']?>">
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $singleItem['name']?>">

        </div>
        <div>
            <label>Summary of Organization:</label>
            <textarea class="form-control" rows="5" id="comment" name="summary" > <?php echo $singleItem['summary']?> </textarea>
        </div>
        <input type="submit" class="btn btn-default">

    </form>
</div>

</body>
</html>