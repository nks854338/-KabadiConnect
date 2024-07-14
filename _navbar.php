<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <header id="home">
    <nav>
      <a href="home.php">
        <div id="logo">RegPicker</div>
      </a>
      <input type="checkbox" id="menu-toggle" class="menu-toggle" />
      <label for="menu-toggle" class="menu-icon"><i class="fa-solid fa-bars"></i></label>
      <div id="menu" class="menu">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About us</a></li>
          <li><a href="#facilitiesSection">Services</a></li>
          <li><a href="#contactUs">Contact us</a></li>
        </ul>
      </div>
      <div class="text-white col text-center">
        <form class="search" action="home.php" method="POST">
          <input type="text" id="search" name="inputData" class="search__input text-white" placeholder="Search...." style="color:#000" />
          <button type="button" class="search__button" name="input"  type='submit'>
            <i class="fa-solid fa-magnifying-glass" style="color: #000;"></i>
          </button>
        </form>
      </div>
      <div class="user">
        <div class="icon1 icon"><i class="fa-solid fa-user" style="color: #000;"></i></div>
        <a href="logout.php"><div class="icon2 icon"><i class="fa-solid fa-right-from-bracket" style="color: red;"></i></div>
        </a>
      </div>
    </nav>
</body>
<script>
  // searchbar js
  function searchBooks() {
    var searchTerm = document.getElementById("search").value;
    var books = document.getElementsByClassName("card");
    for (var i = 0; i < books.length; i++) {
      var bookName = books[i].getElementsByClassName("card-header")[0].innerHTML;
      if (bookName.toLowerCase().indexOf(searchTerm.toLowerCase()) > -1) {
        books[i].style.display = "block";
      } else {
        books[i].style.display = "none";
      }
    }
  }

</script>

</html>