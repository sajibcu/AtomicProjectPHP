<?php
session_start();
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Birthday\Birthday;
use App\BITM\SEIP129150\Birthday\Message;
use App\BITM\SEIP129150\Birthday\Utility;


$birthday=new Birthday();


$totalIteam=$birthday->count();

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
$albirthday=$birthday->paginator($pageStartFrom,$iteamPerPage);
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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="../../../index.php">Home</a></li>
            <li><a href="../Book/index.php">Book</a></li>
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
    <h1>birthday List</h1>
    <a href="create.php" class="btn btn-info" role="button">Add new birthday</a>
    <a href="trashVeiw.php" class="btn btn-primary" role="button">Trash List</a>
    <br>
    <div id="message">
        <?php echo Message::message()?>
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
                <td><?php echo  $sl+$pageStartFrom?></td>
                <td> <?php echo $birthday['id']?></td>
                <td> <?php echo $birthday['name']?></td>
                <td>
                    <?php
                    $birthdayTime=strtotime($birthday['birthday']);
                    $birthdayFormat=date("d-m-y",$birthdayTime);
                    echo $birthdayFormat;


                    ?></td>
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
