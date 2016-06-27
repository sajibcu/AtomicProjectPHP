<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book title</title>

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
<form class="form-horizontal" role="form" method="post" action="store.php">
    <div class="form-group">
        <br>
        <br>
        <label class="control-label col-sm-2" for="email">Book Title:</label>
        <div class="col-sm-10">
            </br>
            </br>
            <input type="text" class="form-control"  placeholder="Enter book title" name="title">
        </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            </br>
            </br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</body>
</html>