<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Email\Email;
use App\BITM\SEIP129150\Book\Message;
$email=new Email();
$email->prepare($_GET);
$singleItem=$email->veiw();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../Resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../Resources/bootstrap/js/bootstrap.js">
</head>
<body>

<div class="container">
    <h2>Atomic Project- Book</h2>
    <form role="form" action="update.php" method="post">
        <div class="form-group">
            <label>Update Email:</label>
            <input type="hidden" name="id"   value="<?php echo $singleItem['id']?>">
            <input type="EMAIL" name="email" class="form-control" id="email" value="<?php echo $singleItem['email']?>">
        </div>

        <button type="submit" class="btn btn-default">Update</button>
    </form>
</div>

</body>
</html>