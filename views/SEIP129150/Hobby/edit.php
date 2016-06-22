<?php
include_once('../../../vendor/autoload.php');
use App\BITM\SEIP129150\Hobby\Hobby;
$hobby=new Hobby();
$hobby->prepare($_GET);
$singlehobby=$hobby->veiw();

$singlehobbyList=explode(',',$singlehobby['hobby']);
//var_dump($singlehobbyList);
//die();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hobby</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Select your hobby</h2>

    <form role="form" action="update.php" method="post" >
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $singlehobby['name']?>">
        <div class="checkbox">
            <label><input type="checkbox" name="hobby[]" value="coding" <?php if(in_array('coding',$singlehobbyList)) echo "checked"?>>Coding</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="hobby[]" value="cycling" <?php if(in_array('cycling',$singlehobbyList)) echo "checked"?>>Cycling</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="hobby[]" value="swimming" <?php if(in_array('swimming',$singlehobbyList)) echo "checked"?>>Swimming</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="hobby[]" value="card" <?php if(in_array('card',$singlehobbyList)) echo "checked"?>>Playing Card</label>
        </div>
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </form>
</div>

</body>
</html>

