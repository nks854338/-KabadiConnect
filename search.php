<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "regpicker";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Rendering products
$q = "SELECT * FROM regpickerproducts";
$result = mysqli_query($conn, $q);

$cnt = mysqli_affected_rows($conn);
$noProduct = $cnt == 0;

// Handling search
$noSearch = true;
if (isset($_POST['input'])) {
    $city = $_POST['city'];
    $sql = "SELECT * FROM `regpickerproducts` WHERE `location` LIKE '%$city%'";
    $output = mysqli_query($conn, $sql);
    $numOfRow = mysqli_affected_rows($conn);
    $noSearch = $numOfRow == 0;
}

// Rendering profiles
$q = "SELECT * FROM regpickers";
$r = mysqli_query($conn, $q);
$cnt = mysqli_affected_rows($conn);
$noProfile = $cnt == 0;
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
        <?php include_once('_navbar.php'); ?>
    </div>
    <div class="bodyGap">
        <section class="searchProductSection secondSection">
            <?php if (isset($_POST['search']) && !$noSearch): ?>
                <div class="secSecheading">Results for "<?php echo htmlspecialchars($city); ?>"</div>
                <div class="secSecCards" style="display: flex; justify-content: space-around; flex-wrap: wrap; margin: auto;">
                    <?php while ($x = mysqli_fetch_assoc($output)): ?>
                        <div class="displayedCard">
                            <div class="displayedProductImage">
                                <img src="<?php echo htmlspecialchars($x['image']); ?>" alt="Product Image" class="img">
                            </div>
                            <div class="displayedProductInfoBox">
                                <div class="displayedProductInfo">
                                    <div class="displayedProductName"><?php echo htmlspecialchars($x['name']); ?></div>
                                    <div class="displayedProductdesc"><?php echo htmlspecialchars($x['description']); ?></div>
                                    <div class="displayedProductPrice">
                                        <span class="currProductPrice">RS. <?php echo htmlspecialchars($x['location']); ?></span>
                                        <span class="previousProductPrice">Rs.1000</span>
                                        <span class="ProductOffer">(50% OFF)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php elseif (isset($_POST['search']) && $noSearch): ?>
                <div class="secSecheading">No results found for "<?php echo htmlspecialchars($city); ?>"</div>
            <?php endif; ?>
        </section>

        <section class="secondSection">
            <div class="sec2heading">Sustainable Scrap Solutions</div>
            <div class="secSecCards">
                <?php if (!$noProduct): ?>
                    <?php mysqli_data_seek($result, 0); ?>
                    <?php while ($x = mysqli_fetch_array($result)): ?>
                        <form method="post" action="regPickerProduct.php">
                            <input type="hidden" name="product_id" value="<?php echo $x[0]; ?>">
                            <button type="submit" name="showproduct" style="all: unset; cursor: pointer;">
                                <div class="card3 secSeccard">
                                    <img src="<?php echo $x[4]; ?>" alt="" class="cardProImg4 cardimg">
                                    <div class="cardinfoboxnameprice">
                                        <div class="cardpara"><?php echo htmlspecialchars($x[1]); ?></div>
                                        <div class="cardprice"><?php echo htmlspecialchars($x[3]); ?></div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="secondSection">
            <div class="sec2heading">RegPickers Profile</div>
            <div class="secSecCards">
                <?php if (!$noProfile): ?>
                    <?php mysqli_data_seek($r, 0); ?>
                    <?php while ($x = mysqli_fetch_array($r)): ?>
                        <form method="post" action="regPickerProfile.php">
                            <input type="hidden" name="product_id" value="<?php echo $x[0]; ?>">
                            <button type="submit" name="showproduct" style="all: unset; cursor: pointer;">
                                <div class="card3 secSeccard smallProfile">
                                    <img src="<?php echo htmlspecialchars($x[4]); ?>" alt="" class="cardProImg4 cardimg">
                                    <div class="cardinfoboxnameprice">
                                        <div class="cardpara"><?php echo htmlspecialchars($x[1]); ?></div>
                                        <div class="cardprice">Location: <?php echo htmlspecialchars($x[3]); ?></div>
                                        <div class="cardprice">Availability: <?php echo htmlspecialchars($x[6]); ?></div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>
    <div class="foot">
        <?php include_once('_footer.php'); ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
