<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Education Level</title>

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
<form  method="post" action="store.php">
    <div class="form-group">
        <br>
        <br>
        <label style="color: #eea236">City</label>
        <div class="col-sm-2">
            </br>
            </br>
                <label>Name:</label>
                <input type="text" name="name" placeholder="Enter your name">
            <label>Select Your Education Level:</label>
                <div class="radio">
                    <label><input type="radio" name="level" value="JSC">JSC</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="level" value="SSC">SSC</label>
                </div>
            <div class="radio">
                <label><input type="radio" name="level" value="HSC">HSC</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="level" value="Honours">Honour's</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="level" value="Masters">Master's</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="level" value="PHD">PHD</label>
            </div>
                <input type="submit" value="Submit" class="btn btn-primary">


        </div>
        </div>
</form>
</body>
</html>