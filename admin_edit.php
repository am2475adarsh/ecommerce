<?php
session_start();
$update_var = 0;
include('config/db_connect.php');

//check connection
if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // $user_name=$_POST['username'];

    $new_name = $_POST['Name'];
    $new_price = $_POST['price'];
    $new_description = $_POST['description'];
    $id = $_POST['id'];
    // echo $new_name;
    // echo  $new_password;
    $sql = "SELECT * FROM product_detail where id= '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['id'] == $id) {
            $sql = "UPDATE product_detail SET price='$new_price' ,names = '$new_name', descriptions='$new_description' where id = '$id' ";
        }
    } else {
        echo "No such product exists";
    }


    if ($conn->query($sql) === TRUE) {
        $update_var = 1;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminE_edit_style.css">
</head>

<body>


    <form method="POST" action="admin_edit.php">
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
                        font-family: 'Tiro Gurmukhi', serif; " align="center">--------&#9734; Admin Edit Panel &#9734--------
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
                                                        <td align="center" class="form_data table-rows">
                                                            <div class="container table-rows" style="margin-top: 34px;">
                                                                <div class="contactForm" style="width:25vw ;  
                                                                max-width: 400px; 
                                                                min-width:20px ;">
                                                                    <form method="POST" action="admin.php">
                                                                        <h2 style="color:rgb(234, 189, 189) ;
                                                                        font-size: min(5.35vw,40px);">
                                                                            Edit Details</h2>
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

    <button>
        <a href="logout.php" style="text-decoration:none;position: absolute;top:2rem;right:2rem;height:4vw;width:6vw">Logout</a></button>

    <button>
        <a href="admin.php" style="position: absolute;top:3.5rem;right:2rem;height:4vw;width:6vw;text-decoration: none;">Admin Add Panel</a>
        </ <button>
        <a href="admin_buy_details.php" style="position: absolute;top:6rem;right:2rem;height:4vw;width:6vw;text-decoration: none;">Products Bought</a></button>

</body>

</html>