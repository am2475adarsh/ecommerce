<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Search-Box</title>
    <link rel="stylesheet" href="index_style.css">
</head>

<body>
    <div class="Hotbg">
        <input type="text" name="" class="Hotbg-txt" placeholder="Search >>>">
        <a href="#" class="Hotbg-btn">
            <i class="fa fa-search"></i>
        </a>
    </div>

    <nav>
        <input id="nav-toggle" type="checkbox">
        <a href="homepage.php">
            <div class="logo" style="font-family:Georgia sans"><strong>E-Commerce</strong>
                <img src="logo.png" alt="" height="55px">
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
        <div class="background-photo">
            <div style="position: absolute; font-size:55px; left : 9em;top:2em; color:rgb(180, 180, 180,0.95)">All Products</div>
            <img src="backgroundimg.jpg" alt="">
            <form method="POST">

                <?php
                include('config/db_connect.php');
                $i = 0;
                $new_score = 5;
                $old_score = 4;
                $iteration = 0;
                $sql = "SELECT * FROM product_detail";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {

                    echo "<table cellpadding='0', cellspacing='1' and border='0'; style='position:absolute;
                top: 21em;
                left: 40em;
                width: 50vw;
                height:20vw;
                margin-top: -9em; 
                margin-left: -15em;
                overflow-y:auto;'>

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
                        $iteration++;
                        echo "<tr style='background-color:rgb(120, 120, 120,0.95);font-weight:bold'>";

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
            </form>
        </div>
    </div>
</body>

</html>