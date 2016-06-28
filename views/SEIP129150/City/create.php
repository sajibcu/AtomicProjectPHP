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
        <label style="color: #eea236">City</label>
        <div class="col-sm-2">
            </br>
            </br>
            <form action="store.php" method="post">
                <label>Name:</label>
            <input type="text" class="form-control"  placeholder="Enter your name" name="name" required>
            <select  name="city" required>
                <?php
                $cityNameString="Barguna|Barisal|Bhola|Jhalokati|Patuakhali|Pirojpur|Bandarban|Brahmanbaria|Chandpur|Chittagong|Comilla|Cox's Bazar|Feni|Khagrachari|Lakshmipur|Noakhali|Rangamati|Dhaka|Faridpur|Gazipur|Gopalganj|Jamalpur|Kishoreganj|Madaripur|Manikganj|Munshiganj|Mymensingh|Narayanganj|Narsingdi|Netrokona|Rajbari|Shariatpur|Sherpur|Tangail|Bagerhat|Chuadanga|Jessore|Jhenaidah|Khulna|Kushtia|Magura|Meherpur|Narail|Satkhira|Bogra|Dinajpur|Gaibandha|Jaipurhat|Kurigram|Lalmonirhat|Naogaon|Natore|Nawabganj|Nilphamari|Pabna|Panchagarh|Rajshahi|Rangpur|Sirajganj|Thakurgaon|Habiganj|Maulvi bazar|Sunamganj|Sylhet";
                $cityNameArray=explode("|",$cityNameString);
                ?>
                <option style="display: none">select</option>
                <?php
                $i=0;
                for($i=0;$i<64;$i++)
                {
                    echo "<option>".$cityNameArray[$i]."</option>";
                }
                ?>
            </select>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>


        </div>
        </div>
</form>
</body>
</html>