<?php
$login = "0";
$error = "0";
if (isset($_POST['s1'])) {

    // db_connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e_commerce";

    $conn = new mysqli($servername, $username, $password, $database);

    //     if ($conn->connect_error) { die("Connection failed: " .
// $conn->connect_error); } $email = $_POST["email"]; $password =
// $_POST["password"]; $sql = "SELECT * FROM `user` WHERE `email`='$email'";
// $result = mysqli_query($conn, $sql); $num = mysqli_num_rows($result); if ($num
// == 1) { $row = mysqli_fetch_assoc($result); if (password_verify($password,
// $row['password'])) { $error = "1"; session_start(); $_SESSION['loggedin'] =
// true; $_SESSION['email'] = $email; header("location: index.php"); exit(); //
// Ensure no further code is executed after the redirect } else { $login = "1";
// echo "
// <h1>Incorrect password</h1>
// "; } } else { $login = "1"; echo "
// <h1>User not found</h1>
// "; } $conn->close(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .navbar {
            margin-top: -2vmin !important;
        }
    </style>

    <title>Register form</title>
</head>

<body>
<div class="bodyGap">
<header class="imdexHeader">
        <div class="logo">  KabadiConnect</div>
        <div class="btns">
          
        </div>
      </header>

    <div class="loginContainer">
        <form action="oldUser.php" method="post" enctype="multipart/form-data" class="loginform">
            <div class="loginFormHeading">
                <h2>Login</h2>
                <p>Welcome back! we miss you!</p>
            </div>
            <div class="loginFormInput">
                <div class="loginInputBox">
                    <div>
                        <i class="fa-solid fa-user" style="color: rgb(0, 0, 0)"></i> Email
                        :
                    </div>
                    <div>
                        <input type="email" class="name" required name="email" />
                    </div>
                </div>
                <div class="loginInputBox">
                    <div>
                        <i class="fa-solid fa-lock" style="color: rgb(2, 2, 2)"></i>
                        Password :
                    </div>
                    <div>
                        <input type="password" class="password" required name="password" />
                    </div>
                </div>
            </div>
            <div class="registerBtn">
                <button name="submit" class="register">Login</button>
            </div>
            <div class="forgotBox">
                <div><a href="#" style="color:rgb(51, 164, 51)">Forgot password?</a></div>
                <div>
                    Not a member?
                    <a href="newUser.php" style="color: rgb(56, 155, 56);">Register Now</a>
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