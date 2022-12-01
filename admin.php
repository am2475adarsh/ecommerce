<?php
session_start();

include('config/db_connect.php');
// "mysqli_real_escape_string" this helps unwanted or harmful data to get into our database

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM product_detail where id= '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['id'] == $id) {

            echo "Product already exists";
        }
    }

    //create sql

    //save to db and check
    else {
        if (mysqli_query($conn, $sql)) {

            // $id = $_SESSION['id'] = $_POST['id'];
            // $names = $_SESSION['name'] = $_POST['Name'];
            // $price = $_SESSION['price'] = $_POST['price'];
            // $description = $_SESSION['description'] = $_POST['description'];
            //success
            $succes = 1;
            $sql = "INSERT INTO product_detail(id,names,price,descriptions) VALUES('$id','$name','$price','$description')";
            mysqli_query($conn, $sql);
        } else {
            //error
            echo 'query error' . mysqli_error($conn);
        }

        //echo 'form is valid';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminE_style.css">
</head>

<body>


    <div class="papa">
        <form method="POST" action="admin.php">
            <table align="center" style="max-width: 602px;
     width: 100%; 
     background-color: black; 
     height: 100%;">

                <tr>

                    <table align="center" style="
            height: 100%;
            max-width: 602px;
            display: block;
            margin: auto;">
                        <tbody style=" height: 100%;
                max-width: 602px;
                display: block;
                margin: auto;">

                            <tr class="table-rows" align="center">
                                <td style="font-size: min(2.5vw,30px);
                        padding-top: 20px;
                        color: antiquewhite;
                        font-family: 'Tiro Gurmukhi', serif; " align="center">--------&#9734; Admin Add Panel &#9734--------
                                </td>
                            </tr>

                            <tr class="table-rows" align="center">
                                <td class="table-rows" align="center">
                                    <div class="flip-card" align="center">
                                        <div class="flip-card-inner" align="center">
                                            <table align="center" align="center" class="table-rows">
                                                <tbody class="table-rows">
                                                    <tr class="table-rows">
                                                        <div class="flip-card-front">
                                                            <span style="cursor:pointer; 
                                                        margin-top: 15px; 
                                                        color:#446169" onclick="flip(event)" class="forgot_pass">Category Z
                                                            </span>
                                                            <td align="center" class="form_data table-rows">
                                                                <div class="container table-rows" style="margin-top: 34px;">
                                                                    <div class="contactForm" style="width:25vw ;  
                                                                max-width: 400px; 
                                                                min-width:20px ;">
                                                                        <form method="POST" action="admin.php">
                                                                            <h2 style="color:rgb(234, 189, 189) ;
                                                                        font-size: min(5.35vw,40px);">
                                                                                Category X</h2>
                                                                            <div class="inputBox">
                                                                                <input type="text" name="id" required>
                                                                                <span>Product ID</span>
                                                                            </div>
                                                                            <div class="inputBox">
                                                                                <input type="text" name="Name" required>
                                                                                <span>Product Name</span>
                                                                            </div>

                                                                            <div class="inputBox">
                                                                                <input name="price" type="text" required>
                                                                                <span>Product Price</span>
                                                                            </div>
                                                                            <div class="inputBox">
                                                                                <textarea name="description" id="" cols="30" rows="0" required></textarea>
                                                                                <span>Description</span>
                                                                            </div>

                                                                            <div class="inputBox">
                                                                                <input type="submit" name="submit" value="submit" class="submit">
                                                                            </div>

                                                                    </div>
        </form>
    </div>
    </div>
    </td>
    </div>

    <div class="flip-card-back" align="center">
        <span class="forgot_pass" style="cursor:pointer ; 
     margin-top: 15px; 
     color:#446169" onclick="flip(event)">Category X
        </span>
        <div class="container" style="margin-top: 15px;">
            <div class="contactForm" style="width:25vw ;  
                                                            max-width: 400px; 
                                                            min-width:20px ;">
                <form method="POST" action="admin.php">
                    <h2 style="color:rgb(234, 189, 189) ;
                                                                    font-size: min(5.35vw,40px);">
                        Category Y
                    </h2>

                    <div class="inputBox">
                        <input type="text" name="id" required>
                        <span>Product ID</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="Name" required>
                        <span>Product Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="price" required>
                        <span>Price</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="description" id="" cols="30" rows="0" required></textarea>
                        <span>Description</span>
                    </div>

                    <div class="inputBox">
                        <input type="submit" name="submit" value="submit" class="submit">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="flip-card-mid" align="center">
        <span class="forgot_pass" style="cursor:pointer ; 
                                                        margin-top: 15px; 
                                                        color:#446169" onclick="flip(event)">Category Y
        </span>
        <div class="container" style="margin-top: 15px;">
            <div class="contactForm" style="width:25vw ;  
                                                            max-width: 400px; 
                                                            min-width:20px ;">
                <form method="POST" action="admin.php">
                    <h2 style="color:rgb(234, 189, 189) ;
                                                                    font-size: min(5.35vw,40px);">
                        Category Z
                    </h2>

                    <div class="inputBox">
                        <input type="text" name="id" required>
                        <span>Product ID</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="Name" required>
                        <span>Product Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="price" required>
                        <span>Price</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="description" id="" cols="30" rows="0" required></textarea>
                        <span>Descriptionn</span>
                    </div>

                    <div class="inputBox">
                        <input type="submit" name="submit" value="submit" class="submit">
                    </div>

            </div>
            </form>
        </div>
    </div>
    </div>
    </tr>
    </tbody>
    </table>
    </div>
    </div>

    </td>
    </tr>
    </tbody>
    </table>
    </tr>
    </table>
    </form>
    </div>

    <button>
        <a href="logout.php" style="text-decoration:none;position: absolute;top:2rem;right:2rem;height:4vw;width:6vw">Logout</a></button>

    <button>
        <a href="admin_edit.php" style="position: absolute;top:3.5rem;right:2rem;height:4vw;width:6vw;text-decoration: none;">Admin Edit Panel</a>
        </ <button>
        <a href="admin_buy_details.php" style="position: absolute;top:6rem;right:2rem;height:4vw;width:6vw;text-decoration: none;">Products Bought</a></button>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script>
        function flip(event) {
            var element = document.querySelector(".flip-card-inner");
            var mid_card = document.querySelector(".flip-card-mid");
            var back_card = document.querySelector(".flip-card-back");

            var flag = 0;


            if (element.className === "flip-card-inner") {
                element.style.backfaceVisibility = "hidden";
                mid_card.style.backfaceVisibility = "hidden";
                if (element.style.transform == "rotateY(180deg)" && mid_card.style.transform != "rotateY(90deg)") {
                    mid_card.style.transform = "rotateY(90deg)";
                    flag = 1;
                    console.log("rotate mid 90");
                }

                if (element.style.transform == "rotateY(180deg)" && flag == 0) {
                    element.style.transform = "rotateY(360deg)";
                    flag = 1;
                    console.log("rotate element 360");
                    mid_card.style.transform = "rotateY(180deg)";

                } else {
                    element.style.transform = "rotateY(180deg)";
                    console.log("rotate 180");
                }
                // back_card.style.display = "none"
            }
            console.log(mid_card.style.transform, element.style.transform);

        };
    </script>
</body>

</html>