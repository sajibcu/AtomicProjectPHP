<?php
session_start();
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\City\City;
use App\BITM\SEIP129150\Book\Message;
use APP\BITM\SEIP129150\Book\Utility;
$city=new city();

$totalIteam=$city->count();

if(array_key_exists("iteamPerPage",$_SESSION))
{
    if(array_key_exists("iteamPerPage",$_GET))
    {
        $_SESSION['iteamPerPage']=$_GET['iteamPerPage'];
    }
}
else
    $_SESSION['iteamPerPage']=5;
$iteamPerPage=$_SESSION['iteamPerPage'];
$noOfPage=ceil($totalIteam/$iteamPerPage);
$pagination="";
if(array_key_exists('pageNumber',$_GET))
{
    $pageNo=$_GET['pageNumber'];
}
else $pageNo=1;
for($i=1;$i<=$noOfPage;$i++)
{
    $active=($pageNo==$i)? "active":"";
    $pagination.="<li class='$active'><a href='index.php?pageNumber=$i'>$i</a></li>";
}
$pageStartFrom=$iteamPerPage*($pageNo-1);
$alcity=$city->paginator($pageStartFrom,$iteamPerPage);


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
<!--<body background="city.jpg">-->
<body>
<div class="container">
    <h1>City List</h1>
    <a href="create.php" class="btn btn-info" role="button">Add new City</a>
    <a href="trashVeiw.php" class="btn btn-primary" role="button">Trash List</a>

    <div id="message">

        <?php
        if(array_key_exists("message",$_SESSION))
            echo Message::message();
        ?>
    </div>
    <form action="index.php">
        <select name="iteamPerPage">
            <option value="" style="display: none"> select</option>
            <option <?php if($_SESSION['iteamPerPage']==5) echo "selected"?>>5</option>
            <option <?php if($_SESSION['iteamPerPage']==10) echo "selected"?>>10</option>
            <option <?php if($_SESSION['iteamPerPage']==15) echo "selected"?>>15</option>
            <option <?php if($_SESSION['iteamPerPage']==20) echo "selected"?>>20</option>
        </select>
        <input type="submit" value="GO" class="btn btn-primary">
    </form>

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
                    name
                </td>
                <td>
                    City
                </td>
                <td>
                    Action
                </td>
            </tr>
            </thead>
            <tbody>
            <?php
            $sl=1;
            foreach ($alcity as $city) {

            ?>
            <tr>
                <td><?php echo  $sl+$pageStartFrom?></td>
                <td> <?php echo $city['id']?></td>
                <td> <?php echo $city['name']?></td>
                <td> <?php echo $city['city']?></td>
                <td>
                    <a href="veiw.php?id=<?php echo $city['id']?>" class="btn btn-info" role="button">View</a>
                    <a href="edit.php?id=<?php echo $city['id']?>" class="btn btn-primary" role="button">Edit</a>
                    <a  href="delete.php?id=<?php echo $city['id']?>" class="btn btn-danger" role="button">Delete</a>
                    <a href="trash.php?id=<?php echo $city['id']?>" class="btn btn-success" role="button">Trash</a>
                </td>
            </tr>

            </tbody>
            <?php $sl++; } ?>
        </table>

        <ul class="pagination">
            <?php
            if($pageNo>1)
            {
                $pageNo--;
                echo "<li class='active'><a href='index.php?pageNumber=$pageNo'>Prev</a></li>";
            }


            ?>
            <?php echo $pagination;

            if(isset($_GET['pageNumber'])&&$_GET['pageNumber']<$noOfPage) {
                $next_item=$_GET['pageNumber']+1;
                echo "<li><a href='index.php?pageNumber=$next_item'>Next</a></li>";
                // Utility::dd($next_item);
            }

            ?>

        </ul>

    </div>
</div>
<script>
    $('#message').show().delay(3000).fadeOut();

</script>

</body>
</html>
