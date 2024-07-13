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
        include_once("_navbar.php");
        ?>
    </div>
    <div class="bodyGap">
    <div class="profileContainer">
        <div class="profileImgBox">
            <div class="profileImg">
                <img src="images/girl.png" height="" alt="">
            </div>
        </div>
        <div class="profileInfoBox">
            <div class="profileInfo">
            <div class="regPickerName">Rohan</div>
            <div class="regPickerInfoDescription">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem perferendis quam expedita dolores minus tempora non consequatur libero deserunt esse!</div>
            <div class="regPickerRatingBox"></div>
            </div>
        </div>
    </div>
    </div>
    <?php 
    include_once('_footer.php');
    ?>
</body>
</html>