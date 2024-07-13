<?php

$show = "0";
$error = "0";
//db_connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "regpicker";

$conn = new mysqli($servername, $username, $password, $database);

if (isset($_POST['submit'])) {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    if (($password == $cpassword)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql ="INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$username', '$hash')"; 
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $show = "1";
            echo "success";
            session_start();
            $_SESSION['user'] = $username;
            $_SESSION['name'] = $name;
            header("location: home.php");
        }
    } else {
        echo "failure";
        $error = "1";
    }

}
$conn->close();


?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <title>Register form</title>

    <style>
        .navbar {
            margin-top: -2vmin !important;
        }
    </style>
</head>

<body>
<div class="bodyGap">
<header class="imdexHeader">
        <div class="logo">RegPicker</div>
        <div class="btns">
          
        </div>
      </header>
    <div class="registerContainer">

        <form action="newUser.php" method="POST" class="registerform">
            <div class="loginFormHeading">
                <h2>Register</h2>
                <p>Join us today and unlock exclusive deals and offers!</p>
            </div>
            <div class="loginFormInput">
                <div class="loginInputBox">
                    <div>
                        <i class="fa-solid fa-user" style="color:rgb(0, 0, 0);"></i> Name :
                    </div>
                    <div>
                        <input type="text" class="name" required name="name">
                    </div>
                </div>
                <div class="loginInputBox">
                    <div>
                        <i class="fa-solid fa-user" style="color:rgb(0, 0, 0);"></i> Email :
                    </div>
                    <div>
                        <input type="email" class="username" required name="username">
                    </div>
                </div>
                <div class="loginInputBox">
                    <div>
                        <i class="fa-solid fa-lock" style="color: rgb(2, 2, 2);"></i> Password :
                    </div>
                    <div>
                        <input type="password" class="password" required name="password">
                    </div>
                </div>
                <div class="loginInputBox">
                    <div>
                        <i class="fa-solid fa-lock" style="color: rgb(2, 2, 2);"></i> Confirm Password :
                    </div>
                    <div>
                        <input type="password" class="cpassword" required name="cpassword">
                    </div>
                </div>
            </div>
            <div class="registerBtn"><button name="submit" class="register">Register</button></div>
            <div class="forgotBox">
                <div>Already have a account?
                    <a href="oldUser.php">Login Here</a>
                </div>
            </div>

        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>