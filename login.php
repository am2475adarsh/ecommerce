<?php

session_start();

$pass_wrong = 0;
$wrong_email_pass = 0;

include('config/db_connect.php'); //this makes a connection

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // $user_name=$_POST['username'];
    $user_pass = $_POST['password'];
    $user_email = $_POST['email'];

    if (!empty($user_pass) && !empty($user_email)) {

        $sql = "SELECT * FROM ecommercet where email='$user_email'";
        $result = mysqli_query($conn, $sql);
        // echo mysqli_num_rows($result);
        if ($result && mysqli_num_rows($result) > 0) {
            //echo "4";
            $user_data = mysqli_fetch_assoc($result);

            // echo $user_data['passwords'];
            // echo $user_data['id'];

            if ($user_data['passwords'] == $user_pass) {


                $_SESSION['userid'] = $user_data['id'];
                $_SESSION['username'] = $user_data['names'];
                $_SESSION['useremail'] = $user_email;
                $_SESSION['userpassword'] = $user_pass;

                //print_r($_SESSION);
                // echo "LOGIN SUCCESSFUL";
                if ($user_email == "admin@gmail.com") {
                    header('location: admin.php');
                } else {
                    header('location: homepage.php');
                }
                //die;
            } else {
                // echo $_POST['password'];
                $pass_wrong = 1;
            }
        } else {
            $wrong_email_pass = 1;


            //sign up karo be !!
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="logine_style.css">
</head>

<body>

    <div class="container">
        <form method="post" class="login-form">

            <div>
                <label class="HEADING" style="position: absolute; top: 33px;font-size:30px; left: 260px;  color: cornsilk">
                    LOGIN
                </label>

                <label class="email_label">Email:</label>
                <input type="text" name="email" class="email" required="required" style="color:black">
            </div>

            <div>
                <label class="password_label">Password:</label>
                <input type="password" name="password" class="password" required="required">
            </div>
            <div>
                <input type="submit" name="submit" value="Submit" class="submit">
            </div>

            <a href="index.php" style="position: absolute; top: 273px;left: 400px;  color: purple;font-size: 15px" ;> CLICK HERE TO SIGN UP</a>

            <?php
            if ($wrong_email_pass == 1 || $pass_wrong == 1) {
            ?>
                <div style="font-size: 20px;position:absolute;top:73px;left:230px; color:crimson;"><?php echo "Wrong credentials"; ?>
                <?php } ?>

        </form>
    </div>


    <!-- //home page. -->

    <!-- storing typed data into variable -->

    <!-- //incase koi error hui toh waapas idhar paste kardena -->


</body>

</html>