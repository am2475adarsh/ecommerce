<?php
session_start();

include('config/db_connect.php');

$succes = 0;
$email_var = 0;
$names = $email = $passwords = '';
$error = array('email' => '', 'names' => '', 'passwords' => '');

if (isset($_POST['submit'])) {

    //check email
    if (empty($_POST['email'])) {
        $error['email'] = 'An email is required <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Email must be a valid email address';
        }
    }

    //check names
    if (empty($_POST['names'])) {
        $error['names'] =  'A user name is required <br />';
    } else {
        $names = $_POST['names'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $names)) {
            $error['names'] = 'names must be letters and spaces only';
        }
    }

    //check passwords
    if (empty($_POST['passwords'])) {
        $error['passwords'] = 'A password is required <br />';
    } else {
        $passwords = $_POST['passwords'];
    }

    //checking if any error while submitting 
    if (array_filter($error)) {
        // echo 'errors in the form';
    } else {

        // "mysqli_real_escape_string" this helps unwanted or harmful data to get into our database
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $names = mysqli_real_escape_string($conn, $_POST['names']);
        $passwords = mysqli_real_escape_string($conn, $_POST['passwords']);


        $sql = "SELECT * FROM ecommercet where email= '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['email'] == $email) {

                $email_var = 1;
            }
        } else {
            //create sql


            //save to db and check
            if (mysqli_query($conn, $sql)) {

                $email = $_SESSION['useremail'] = $_POST['email'];
                $names = $_SESSION['username'] = $_POST['names'];
                $passwords = $_SESSION['userpassword'] = $_POST['passwords'];
                //success
                $succes = 1;
                $sql = "INSERT INTO ecommercet(names,passwords,email) VALUES('$names','$passwords','$email')";
                mysqli_query($conn, $sql);
            } else {
                //error
                echo 'query error' . mysqli_error($conn);
            }

            //echo 'form is valid';
        }
    }
} // end of POST check

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel='stylesheet' type='text/css' href='styleE.css' />
    <link rel="icon" href="logo.png" type="image/icon type">
</head>
<!-- <?php include('<header.php'); ?> -->

<div class="container">
    <div>
        <h4 class="Login" style="position: absolute; top: -17px;font-size:30px; left: 250px;  color: cornsilk">Sign-up</h4>
        <form action="index.php" class="sign-form" method="POST">

            <div style="color: crimson; position:absolute; top:130px;left:165px"><?php if ($email_var == 1) echo "Email already exists" ?></div>

            <div style="color: green; position:absolute; top:290px;left:210px"><?php if ($succes == 1) echo "Account set successfully" ?></div>

            <label for="Email" class="email_label">Email :</label>
            <input type="text" name="email" class="email" required="required" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text-email"><?php echo $error['email']; ?></div>
    </div>
    <div>
        <label for="names" class="name_label">Name :</label>
        <input type="text" name="names" class="name" required="required" value="<?php echo htmlspecialchars($names) ?>">
        <div class="red-text-name"><?php echo $error['names']; ?></div>
    </div>
    <div>
        <label class="password_label">Password :</label>
        <input type="password" name="passwords" class="password" required="required" value="<?php echo htmlspecialchars($passwords) ?>">
        <div class="red-text-password"><?php echo $error['passwords']; ?></div>
    </div>
    <div class="button">
        <input type="submit" name="submit" value="submit" class="submit">
    </div>

    <a href="login.php" style="position: absolute; top: 345px;left: 415px;  color: purple;font-size: 15px" ;> CLICK HERE TO LOGIN</a>
    </form>
</div>



</body>

</html>