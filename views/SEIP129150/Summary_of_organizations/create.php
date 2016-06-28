<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create</title>

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
<div class="container">
    <h2>textarea</h2>

    <form role="form" action="store.php" method="post">
        <div class="form-group">
            <label>Organization Name:</label>
            <input type="text" name="name" required placeholder="Enter your Organization name">
            </br>
            <label for="comment">Summary:</label>
            </br>
             <textarea class="form-control" rows="5" id="comment" name="summary"></textarea>
        </div>
        <input type="submit" value="Submit" class="btn btn-default">
    </form>
</div>
</body>
</html>