<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Book\Book;
use App\BITM\SEIP129150\Book\Message;
$book=new Book();
$book->prepare($_GET);
$singleItem=$book->veiw();
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
            <label>Update Book title:</label>
            <input type="hidden" name="id"   value="<?php echo $singleItem['id']?>">
            <input type="text" name="title" class="form-control" id="email" value="<?php echo $singleItem['title']?>">
        </div>

        <button type="submit" class="btn btn-default">Update</button>
    </form>
</div>

</body>
</html>