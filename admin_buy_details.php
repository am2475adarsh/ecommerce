<?php
session_start();
include('config/db_connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage_style.css">
    <link rel="icon" href="logo.png" type="image/icon type">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Products</title>
    <style>
        table {

            border-style: solid;

            border-width: 2px;

            border-color: pink;

        }
    </style>
</head>

<body>

    <nav>
        <input id="nav-toggle" type="checkbox">
        <a href="homepage.php">
            <div class="logo" style="font-family:Georgia sans"><strong>E-Commerce</strong>
            </div>
        </a>

        <ul class="links">

            <li><a href="homepage.php">Products</a></li>
            <li><a href="admin.php">Add Items</a></li>
            <li><a href="admin_edit.php">Edit Details</a></li>


            <li><a href="logout.php">Logout</a></li>
        </ul>
        <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </label>
    </nav>

    <div class="container">

        <div style="font-size:55px; color: #515050f2;" align="center">Products Bought</div>


        <?php
        include('config/db_connect.php');
        $i = 0;
        $sql = "SELECT * FROM confirm_product";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {

            echo "<table cellpadding='10', cellspacing='1' and border='0';'>

<tr style='background-color: rgb(32, 31, 31); font-weight:bold;font-size:17px;color: cornsilk'>
<th>SNo.</th>
<th>Product Id</th>

<th>Product name</th>

<th>Product Price</th>
<th>User ID</th>
<th>User Name</th>
<th>User Email</th>


</tr>";
            // output data of each row
            // echo "Rank: ".$i." " ."id: " . $user_data['id']." ". "Name: ".$user_data['names'] . " "."Score : ".$user_data['scores']. "<br>";

            while ($user_data = mysqli_fetch_assoc($result)) {
                $i++;
                echo "<tr style='background-color:#4a4747f2;font-weight:bold'>";

                echo "<td style='text-align:center'>" . $i . "</td>";

                echo "<td style='text-align:center'>"  . $user_data['prod_id'] . "</td>";

                echo "<td style='text-align:center'>"  . $user_data['prod_name'] . "</td>";

                echo "<td style='text-align:center'>" . $user_data['prod_price'] . "</td>";
                echo "<td style='text-align:center'>" . $user_data['user_ids'] . "</td>";
                echo "<td style='text-align:center'>" . $user_data['user_names'] . "</td>";
                echo "<td style='text-align:center'>" . $user_data['email'] . "</td>";


                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "RESULT : 0";
        }
        ?>
    </div>
</body>

</html>