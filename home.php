<?php                                           //this script is for rendering cards from product table
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "regpicker";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM regpickerproducts";
$result = mysqli_query($conn, $q);

$cnt = mysqli_affected_rows($conn);
if ($cnt == 0) {
    $noProduct = true;
} else {
    $noProduct = false;
}

?>



<?php                                           //this script is for rendering profile of RegPickers from regPickers table

$servername = "localhost";
$username = "root";
$password = "";
$database = "regpicker";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM regpickers";
$r = mysqli_query($conn, $q);

$cnt = mysqli_affected_rows($conn);
if ($cnt == 0) {
    $noProfile = true;
} else {
    $noProfile = false;
}

?>




<?php                                            //this script is for search


if (isset($_POST['input'])) {
    $inputData = $_POST['inputData'];
    if($inputData==""){
         $noInput = true;  
    }
    else{
    $q = "SELECT * FROM `regpickers` where `location` = 'Delhi'";
    $output = mysqli_query($conn, $q);
    $numOfRow = mysqli_affected_rows($conn);

    if (!$output) {
        die("Query failed: " . mysqli_error($conn));
    }

    if ($numOfRow == 0) {
        $noInput = true;   
        echo "false";              //this varibale is used to render the cards on Home page
    } else {
        $noInput = false;
        echo "true";
    }
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <div>
        <?php include_once ('_navbar.php'); ?>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/503.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>Welcome to KabadiConnect</h4>
        <p>Connecting you with reliable local rag pickers to manage your scrap efficiently.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/500.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>Eco-Friendly and Sustainable</h4>
        <p>Join us in making a positive impact on the environment by recycling responsibly.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/503.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>How KabadiConnect Works</h4>
        <p>Easily search, connect, and get the best prices for your scrap materials.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <div class="bodyGap">

    <section class="searchProductSection secondSection">                      <!-- this section renders search datas -->                
            <?php
            if (isset($_POST['search'])) {
                echo "<div class='secSecheading'>
                Result for `$name`
            </div>";
            }

            if (isset($_POST['input'])) {
                if(!$inputData==""){
                echo "<div class='secSecheading'>
                Result for `$inputData`
            </div>";
                }
            }
            ?>
            <div class="secSecCards"
                style='display: flex; justify-content: space-around; flex-wrap: wrap;  margin: auto;'>
                <?php
                if (isset($_POST['search'])) {
                    if (!$noSearch) {
                
                        $startNum = 1;
                        $endNum = 50;
                        $count = 0;
                        while ($x = mysqli_fetch_assoc($output)) {
                            if ($count < $skip) {
                                echo "
 <div class='displayedCard'>
      <div class='displayedProductImage'>
        <img
          src='{$x['image']}'
          alt='
          class='img'
        />
      </div>
      <div class='displayedProductInfoBox'>
        <div class='displayedProductInfo'>
          <div class='displayedProductName'>{$x['productName']}</div>
          <div class='displayedProductdesc'>{$x['productDescription']}</div>
          <div class='displayedProductPrice'>
            <span class='currProductPrice'>RS.{$x['ProductPrice']}</span>
            <span class='previousProductPrice'>Rs.1000</span>
            <span class='ProductOffer' span>(50%OFF)</span>
          </div>
        </div>
      </div>
    </div>
                ";
                            }
                            $count++;
                        }
                    }
                }

                if (isset($_POST['input'])) {
                    if (!$noInput) {
                        $startNum = 1;
                        $endNum = 50;
                        $count = 0;
                        while ($x = mysqli_fetch_assoc($output)) {
                            if ($count < $skip) {
                                echo "
 <div class='displayedCard'>
      <div class='displayedProductImage'>
        <img
          src='{$x['image']}'
          alt='
          class='img'
        />
      </div>
      <div class='displayedProductInfoBox'>
        <div class='displayedProductInfo'>
          <div class='displayedProductName'>{$x['productName']}</div>
          <div class='displayedProductdesc'>{$x['productDescription']}</div>
          <div class='displayedProductPrice'>
            <span class='currProductPrice'>RS.{$x['ProductPrice']}</span>
            <span class='previousProductPrice'>Rs.1000</span>
            <span class='ProductOffer' span>(50%OFF)</span>
          </div>
        </div>
      </div>
    </div>
                ";
                            }
                            $count++;
                        }
                    }
                }


                ?>
            </div>
        </section>



        <section class="secondSection">
            <div class="sec2heading">
            Sustainable Scrap Solutions
            </div>
            <div class="secSecCards">
                <?php
                if (!$noProduct) {
                    // Reset the result pointer to the beginning
                    mysqli_data_seek($result, 0);

                    $startNum = 0;
                    $endNum = 4;
                    $count = 15;
                    while ($x = mysqli_fetch_array($result)) {
                        if ($count > $startNum) {
                            echo "<form method='post' action='regPickerProfile.php'>
                                    <input type='hidden' name='product_id' value='{$x[0]}'>
                                    <button type='submit' name='showproduct' style='all: unset; cursor: pointer;'>
                                      <div class='card3 secSeccard'>
                            <img src='$x[4]' alt='' class='cardProImg4 cardimg'>
                            <div class='cardinfoboxnameprice'>
                            <div class='cardpara'>
                                $x[1]
                            </div>
                            <div class='cardprice'>
                                $x[3]
                            </div>
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

        <section class="secondSection">
            <div class="sec2heading">
           regPickers profile
            </div>
            <div class="secSecCards">
                <?php
                if (!$noProfile) {
                    // Reset the result pointer to the beginning
                    mysqli_data_seek($result, 0);

                    $startNum = 0;
                    $endNum = 4;
                    $count = 15;
                    while ($x = mysqli_fetch_array($r)) {
                        if ($count > $startNum) {
                            echo "<form method='post' action='regPickerProfile.php'>
                                    <input type='hidden' name='product_id' value='{$x[0]}'>
                                    <button type='submit' name='showproduct' style='all: unset; cursor: pointer;'>
                                      <div class='card3 secSeccard smallProfile'>
                            <img src='$x[4]' alt='' class='cardProImg4 cardimg'>
                            <div class='cardinfoboxnameprice'>
                            <div class='cardpara'>
                                $x[1]
                            </div>
                            <div class='cardprice'>
                                $x[3]
                            </div>
                            <div class='cardprice'>
                                Availability: $x[3]
                            </div>
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
    <div class="foot">
        <?php
        include_once ('_footer.php');
        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script></div>
</html>