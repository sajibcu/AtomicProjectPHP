<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Create Profile</h2>
    <form role="form" action="store.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control"name="name" >
        </div>
        <div class="form-group">
            <label for="pwd">Upload your profile picture:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

