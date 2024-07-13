<?php                                           //this script is for rendering cards
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "e_commerce";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM producttype";
$result = mysqli_query($conn, $q);

$cnt = mysqli_affected_rows($conn);
if ($cnt == 0) {
    $noProduct = true;
} else {
    $noProduct = false;
}

?>



<?php                                            //this script is for search

if (isset($_POST['search'])) {
    $product_id = $_POST['product_id'];

    $sql = "SELECT * FROM `producttype` WHERE `sno`='$product_id'";
    $r = mysqli_query($conn, $sql);

    if ($r) {
        $array = mysqli_fetch_array($r);
        $name = $array['name'];
    }

    $q = "SELECT * FROM `product` WHERE `productname`like '%$name%'";
    $output = mysqli_query($conn, $q);
    $numOfRow = mysqli_affected_rows($conn);

    if (!$output) {
        die("Query failed: " . mysqli_error($conn));
    }

    if ($numOfRow == 0) {
        $noSearch = true;                 //this varibale is used to render the cards on Home page
    } else {
        $noSearch = false;
    }
}

?>


<?php

if (isset($_POST['input'])) {
    $inputData = $_POST['inputData'];
    if($inputData==""){
         $noInput = true;  
    }
    else{
    $q = "SELECT * FROM `product` WHERE `productname` like '%$inputData%' || `productDescription` like '%$inputData%' || `searchkey` like '%$inputData%'";
    $output = mysqli_query($conn, $q);
    $numOfRow = mysqli_affected_rows($conn);

    if (!$output) {
        die("Query failed: " . mysqli_error($conn));
    }

    if ($numOfRow == 0) {
        $noInput = true;                 //this varibale is used to render the cards on Home page
    } else {
        $noInput = false;
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <div>
        <?php include_once ('_navbar.php'); ?>
    </div>
    <div class="bodyGap"></div>
    <section class="secondSection">
        <div class="secSecheading">
            Shop our popular gift categories
        </div>
        <div class="secSecCards">
            <?php
            if (!$noProduct) {
                // Reset the result pointer to the beginning
                mysqli_data_seek($result, 0);

                $startNum = 7;
                $endNum = 13;
                $count = 0;
                while ($x = mysqli_fetch_array($result)) {
                    if ($count > $startNum && $count < $endNum) {
                        echo "<form method='post' action='home.php'>
                                    <input type='hidden' name='product_id' value='{$x[0]}'>
                                    <button type='submit' name='search' style='all: unset; cursor: pointer;'>
                                      <div class='card3 secSeccard'>
                            <img src='$x[2]' alt='' class='cardProImg4 cardimg'>
                            <div class='cardpara'>
                                $x[1]
                            </div>
                          </div>
                           </button>
                                </form>";
                    }
                    $count++;
                }
            }
            ?>
        </div>
    </section>
    </div>
</body>

</html>