<?php                                      //this script is for showing full profile of user or product and dedirecting to regPickerProfile.php
if (isset($_POST['showproduct'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "regpicker";
    $conn = new mysqli($servername, $username, $password, $database);
    $product_id = $_POST['product_id'];

    $q = "SELECT * FROM regpickerproducts where sno=$product_id";
    $result = mysqli_query($conn, $q);

    $cnt = mysqli_affected_rows($conn);
    if ($cnt == 0) {
        $noProduct = true;
    } else {
        $noProduct = false;
    }
}

?>


<?php                                           //this script is for rendering cards from producttype table



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>profile</title>
</head>

<body>
    <div>
        <?php
        include_once ("_navbar.php");
        ?>
    </div>
    <div class="bodyGap">
        <div class="profileContainer">
            <?php
            if (!$noProduct) {
                while ($x = mysqli_fetch_array($result)) {
                        echo " <div class='profileImgBox'>
            <div class='profileImg'>
                <img src='$x[4]' height=' alt='>
            </div>
        </div>
        <div class='profileInfoBox'>
            <div class='profileInfo'>
               <div class='regPickerName'>Name: $x[1]</div>
               <div class='regPickerInfoDescription'>$x[2]</div>
               <div class='profileLocation'>$x[3]</div>
            </div>
        </div>";
                    }
                }
            ?>
        </div>
    </div>
    <?php
    include_once ('_footer.php');
    ?>
</body>

</html>