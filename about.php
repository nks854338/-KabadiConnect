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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>About</title>
</head>

<body>
  <?php
  include_once ('_navbar.php');
  ?>
  <div class="bodyGap">
    <section class="aboutSection">
      <div class="aboutTopBox">
        <div class="aboutHeading">About</div>
        <div class="aboutTopPara">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, fuga rem? Ea nostrum
          culpa laboriosam enim aliquam sequi accusantium commodi velit suscipit, repellendus laudantium eius, nulla
          iusto soluta. Officia eum id adipisci. Reiciendis praesentium, sint itaque quibusdam sequi officia
          exercitationem.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit eius praesentium iure
          perspiciatis ullam dolores ipsum perferendis aut laborum vero ducimus cumque incidunt quasi est, autem
          temporibus hic tempora et.</div>
        <div class="aboutTopImageBox">
          <img src="images/girl_1.png" alt="">
        </div>
        <div class="aboutHeading">About</div>
        <div class="aboutTopPara">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit eius
          praesentium iure perspiciatis ullam dolores ipsum perferendis aut laborum vero ducimus cumque incidunt quasi
          est, autem temporibus hic tempora et.</div>
      </div>

      <hr>

      <div class="sec3box">
        <div class="container">
          <div class="box1">
            <div class="first1">
              <h3 class="aboutBox1Heading">
                Fresh, Fast, and Flawless Laundry Service for
              </h3>
            </div>
          </div>

          <div class="box2">
            <div class="image">
              <img src="images/pngwing.com (7).png" id="img_1" />
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="aboutMidBox">
        <div class="aboutHeading">Team</div>
        <div class="aboutTopPara">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, fuga rem? Ea nostrum
          culpa </div>
        <div class="teamsBox">
          <div class="firSecComp2">
            <?php
            if (!$noProduct) {
              $skip = 7;
              $count = 0;
              while ($x = mysqli_fetch_array($result)) {
                if ($count < $skip) {
                  echo "<div class='firSecBox1 firSecBox'>
                                <form method='post' action='index.php'>
                                    <input type='hidden' name='product_id' value='{$x[0]}'>
                                    <button type='submit' id='' name='search' style='all: unset; cursor: pointer;'>
                                        
                    <div class='images'>
                        <a href='index.php'><img src='{$x[2]}' alt='' class='proImg' height='100%' style='border-radius: 50%;'></a>
                    </div>
                    <p class='proNam'>{$x[1]}</p>
                      </button>
                                </form>
                  </div>";
                }
                $count++;
              }
            }
            ?>
          </div>
          <div class="firSecComp2">
            <?php
            if (!$noProduct) {
              $skip = 7;
              $count = 0;
              while ($x = mysqli_fetch_array($result)) {
                if ($count < $skip) {
                  echo "<div class='firSecBox1 firSecBox'>
                                <form method='post' action='index.php'>
                                    <input type='hidden' name='product_id' value='{$x[0]}'>
                                    <button type='submit' id='' name='search' style='all: unset; cursor: pointer;'>
                                        
                    <div class='image'>
                        <a href='index.php'><img src='{$x[2]}' alt='' class='proImg' height='100%' style='border-radius: 50%;'></a>
                    </div>
                    <p class='proNam'>{$x[1]}</p>
                      </button>
                                </form>
                  </div>";
                }
                $count++;
              }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php
  include_once ("_footer.php");
  ?>

</body>

</html>