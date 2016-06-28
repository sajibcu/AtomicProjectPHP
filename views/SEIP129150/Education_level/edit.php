<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Education_level\Education_level;
$education=new Education_level();
$education->prepare($_GET);

$educationLevel=$education->veiw();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>education</title>

    <!-- Bootstrap -->
    <link href="../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../resources/bootstrap/js/bootstrap.min.js rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<form  method="post" action="update.php">
    <div class="form-group">
        <br>
        <br>
        <label style="color: #eea236">Education</label>
        <div class="col-sm-2">
            </br>
            </br>
            <label>Name:</label>
            <input type="text" name="id" hidden value="<?php echo  $educationLevel['id']?>">
            <input type="text" name="name" value="<?php echo  $educationLevel['name']?>">
            <label>Select Your Education Level:</label>
            <div class="radio">
                <label><input  type="radio" <?php if($educationLevel['level']=='JSC') echo "checked"?> name="level" value="JSC">JSC</label>
            </div>
            <div class="radio">
                <label><input type="radio" <?php if($educationLevel['level']=='SSC') echo "checked"?>  name="level" value="SSC">SSC</label>
            </div>
            <div class="radio">
                <label><input type="radio" <?php if($educationLevel['level']=='HSC') echo "checked"?>  name="level" value="HSC">HSC</label>
            </div>
            <div class="radio">
                <label><input type="radio" <?php if($educationLevel['level']=='Honours') echo "checked"?> name="level" value="Honours">Honour's</label>
            </div>
            <div class="radio">
                <label><input type="radio" <?php if($educationLevel['level']=='Masters') echo "checked"?> name="level" value="Masters">Master's</label>
            </div>
            <div class="radio">
                <label><input type="radio" <?php if($educationLevel['level']=='PHP') echo "checked"?> name="level" value="PHD">PHD</label>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">


        </div>
    </div>
</form>
</body>
</html>
