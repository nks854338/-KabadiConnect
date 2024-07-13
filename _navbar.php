<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" href="style.css">
       <style>
        
/* navbar */
.navheader {
  background-color: green;
  box-shadow: 0 5px 10px rgb(35, 33, 33);
  padding: 0px 3%;
  height: 13vmin;
  display: flex;
  justify-content: space-between;
  text-align: center;
  text-decoration: none;
  align-items: center;
  position: sticky;
  top: 0;
  z-index: 1;
}

.navheader .logo {
  display: flex;
  align-items: center;
  font-family: cursive;
  font-weight: bolder;
  font-size: 27px;
  color: white;
  text-decoration: none;
}

.navheader .navbar ul {
  list-style: none;
  display: flex;
  padding: 0px;
  margin: 0px;
}

.navheader .navbar ul li {
  position: relative;
  float: left;
  text-decoration: none;
}

.navheader .navbar ul li a {
  font-size: 20px;
  padding: 20px;
  color: white;
  display: block;
  background-color: green;
  text-decoration: none;
}

.navheader .navbar ul li a:hover {
  border: solid;
  border-radius: 5px;
}

.navheader .navbar ul li ul {
  position: absolute;
  left: 0;
  width: 170px;
  display: none;
}

.navheader .navbar ul li ul li {
  width: 100%;
  text-decoration: none;
}

.navheader .navbar ul li ul li ul {
  left: 170px;
  top: 0;
}

.navheader .navbar ul li:focus-within>ul,
.navheader .navbar ul li:hover>ul {
  display: initial;
}

#menu-bar {
  display: none;
}

.navheader label {
  font-size: 20px;
  color: #333;
  cursor: pointer;
  display: none;
}

.menuBtn{
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  gap: 2vmin;
  font-size: 3.5vmin;
  color: #fff;
}

.menuBtn .icon:hover{
  transform: scale(1.1);
}





@media(max-width:1430px) {
  .navheader .logo {
    font-size: 23px;
  }

  .navheader .navbar ul li a {
    font-size: 15px;
  }

}



@media(max-width:1060px) {

  .navheader{
    padding: 0px 5%;
  }

  .navheader label {
    display: initial;
  }

  .navheader .logo {
    font-size: 15px;
  }

  .navheader .navbar {
    position: absolute;
    top: 12%;
    left: 0;
    right: 0;
    background: #fff;
    border-top: 1px solid #333;
    display: none;
  }

  .navheader .navbar ul li {
    width: 100%;
  }

  .navheader .navbar ul li ul {
    position: relative;
    width: 100%;
  }

  .navheader .navbar ul li ul li {
    background: #eee;
  }

  .navheader .navbar ul li ul li ul {
    width: 100%;
    left: 0;
  }

  #menu-bar:checked~.navbar {
    display: initial;
  }
}

/* navbar css end */


       </style>
        <title>Document</title>
</head>
<body>
<header class="navheader">
    <a href="#" class="logo">
      EcoReg
    </a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar"><i class="fa-solid fa-bars" style="color: #ffffff;"></i></label>

    <nav class="navbar">
      <ul>

        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#program">Programs+</a>
          <ul>
            <li><a href="#program">Medical</a></li>
            <li><a href="#program">Enginnering +</a>
              <ul>
                <li><a href="#program">IT</a></li>
                <li><a href="#program">Electrical</a></li>
                <li><a href="#program">Aerospace</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#campus_life">Campus Life</a></li>
        <li><a href="#admission">Admissions</a></li>
      </ul>
    </nav>
    <div class="menuBtn">
     <div class="icon" id="icon1"><i class="fa-solid fa-shop"></i></div>
     <div class="icon" id="icon2"><i class="fa-solid fa-shop"></i></div>
     <div class="icon" id="icon3"><i class="fa-solid fa-shop"></i></div>
    </div>
  </header>
</body>
</html>