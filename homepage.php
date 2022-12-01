<?php
session_start();
include('config/db_connect.php');
$user_id = $_SESSION['userid'];
$user_name = $_SESSION['username'];
$user_email = $_SESSION['useremail'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $sql = "SELECT * FROM product_detail where id= '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['id'] == $id) {
            $prod_id = $user_data['id'];
            $prod_name = $user_data['names'];
            $prod_price = $user_data['price'];
            $sql = "INSERT INTO confirm_product(user_names,email,user_ids,prod_id,prod_name,prod_price) VALUES('$user_name','$user_email','$user_id','$prod_id','$prod_name','$prod_price')";
            // echo "PRODUCT FOUND";
            mysqli_query($conn, $sql);
        }
    } else {
        echo "No such product exists";
    }
}
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


            <li><a href="logout.php">Logout</a></li>
        </ul>
        <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </label>
    </nav>

    <div class="container">

        <div style="font-size:55px; color: #515050f2;" align="center">All Products</div>


        <?php
        include('config/db_connect.php');
        $i = 0;
        $sql = "SELECT * FROM product_detail";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {

            // top: 21em;
            // left: 37em;
            // width: 50vw;
            // height:20vw;
            // margin-top: -9em; 
            // margin-left: -15em;
            // overflow-y:auto;
            echo "<table cellpadding='10', cellspacing='1' and border='0';'>

<tr style='background-color: rgb(32, 31, 31); font-weight:bold;font-size:17px;color: cornsilk'>
<th>SNo.</th>
<th>Product Id</th>

<th>Product name</th>

<th>Description</th>
<th>Price</th>


</tr>";
            // output data of each row
            // echo "Rank: ".$i." " ."id: " . $user_data['id']." ". "Name: ".$user_data['names'] . " "."Score : ".$user_data['scores']. "<br>";

            while ($user_data = mysqli_fetch_assoc($result)) {
                $i++;
                echo "<tr style='background-color:#4a4747f2;font-weight:bold'>";

                echo "<td style='text-align:center'>" . $i . "</td>";

                echo "<td style='text-align:center'>"  . $user_data['id'] . "</td>";

                echo "<td style='text-align:center'>"  . $user_data['names'] . "</td>";

                echo "<td style='text-align:center'>" . $user_data['descriptions'] . "</td>";
                echo "<td style='text-align:center'>" . $user_data['price'] . "</td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "RESULT : 0";
        }
        ?>
    </div>

    <form action="" method="POST">
        <div class="contactForm">
            <div class="inputBox">
                <input style="height:2vw;width:11vw;background-color:#b8dfe5" placeholder="Product ID" name="id" type="text" required>
            </div>

            <div class="inputBox" style="height:1vw;width:11vw;margin-top:1rem">
                <input style="background-color:#625f50;padding:7px; border:1px solid black;color:aliceblue" type="submit" name="submit" value="Buy" class="submit">
            </div>
        </div>
    </form>
</body>

</html>