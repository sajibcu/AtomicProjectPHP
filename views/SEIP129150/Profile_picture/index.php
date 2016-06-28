<?php
session_start();
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Profile_picture\ImageLoader;
use App\BITM\SEIP129150\Book\Message;
$pp=new ImageLoader();
$ppicture=$pp->index();

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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="../../../index.php">Home</a></li>
            <li><a href="/index.php">Book</a></li>
            <li><a href="../Birthday/index.php">Birthday</a></li>
            <li><a href="../City/index.php">City</a></li>
            <li><a href="../Education_level/index.php">Education Level</a></li>
            <li><a href="../Email/index.php">Email</a></li>
            <li><a href="../Hobby/index.php">Hobby</a></li>
            <li><a href="../Profile_picture/index.php">Profile Picture</a></li>
            <li><a href="../Summary_of_organizations/index.php">Organization</a></li>

        </ul>
    </div>
</nav>
<div class="container">
    <h1>Profile Picture List</h1>
    <a href="create.php" class="btn btn-info" role="button">Add new profile Picture</a>
    <a href="trashVeiw.php" class="btn btn-primary" role="button">Trash List</a>
    <select>
        <option value="" style="display: none"> select</option>
        <option value="ten">10</option>
        <option value="fifty">50</option>
        <option value="hundred">100</option>
    </select>
    <br>
    <div id="message">
        <?php if((array_key_exists('message',$_SESSION)&& !empty($_SESSION['message']))){
            echo Message::message();
        }?>
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
                <td><?php echo  $sl?></td>
                <td> <?php echo $pic['id']?></td>
                <td> <?php echo $pic['name']?></td>
                <td> <img src="../../../resources/images/<?php echo $pic["imageName"]?>" alt height="100px" width="100px"></td>
                <td>
                    <a href="veiw.php?id=<?php echo $pic['id']?>" class="btn btn-info" role="button">View</a>
                    <a href="edit.php?id=<?php echo $pic['id']?>" class="btn btn-primary" role="button">Edit</a>
                    <a href="delete.php?id=<?php echo $pic['id']?>" class="btn btn-danger" role="button">Delete</a>
                    <a href="trash.php?id=<?php echo $pic['id']?>" class="btn btn-success" role="button">Trash</a>
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
