<?php
include("./db_con.php");
include("./function.php");

session_start();
$aq=1;
$cq=1;
$rq=1;
$dq=1;
$wq=1;
$pq=1;
$pnq=1;
$sq=1;
$db_user_id=$_SESSION['id'];
if(isset($_REQUEST['almonds'])){
  $a="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','almonds','799','$aq')";
  if(mysqli_query($conn,$a)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['cashew'])){
  $c="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','cashew','729','$cq')";
  if(mysqli_query($conn,$c)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['raisin'])){
  $r="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','raisin','589','$rq')";
  if(mysqli_query($conn,$r)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['dates'])){
  $d="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','dates','849','$dq')";
  if(mysqli_query($conn,$d)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['walnut'])){
  $w="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','walnut','719','$wq')";
  if(mysqli_query($conn,$w)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['pistachio'])){
  $p="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','pistachio','799','$pq')";
  if(mysqli_query($conn,$p)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['pine_nut'])){
  $pn="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','pine nut','699','$pnq')";
  if(mysqli_query($conn,$pn)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['saffron'])){
  $s="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','saffron','2789','$sq')";
  if(mysqli_query($conn,$s)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}





?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>D-Fruits</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="ad">
    <p>Get exciting offers and prices on orders above Rs. 999</p>
  </div>
  <nav class="navbar navbar-expand-lg bg-light sticky-top" id="navbar">
    <div class="container-fluid">
      <a href="index.php"><img src="download (2).png" alt="NOt Supporting" height="100" width="130" id="logo"></a>
      <div class="container-fluid">
        <form class="d-flex" role="search" method="POST" action='search.php'>
          <input class="form-control me-0.5" name="item_name" type="search" placeholder="Search D-Fruits" aria-label="Search"
            width="530px" id="searchbar" autocomplete="off">
          <button class="btn btn-outline-warning" name="submit" type="submit">Search</button>
        </form>
      </div>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Contact us
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="contactus.php">Customer Support</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Excitingcombos.php">Exciting Combos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"> My Cart</a>
        </li>
          <li class="nav-item">
            <?php
            if(isset($_SESSION['is_login'])==true){ ?>
              <a class="nav-link" href="logout.php">Logout</a>
              <?php
            }
            else{ ?>
            <a class="nav-link" href="login.php">Login/Sign up</a>
            <?php
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="bibek.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="caro1.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <form action="" method="POST">
  <div id="cards">
    <div class="blocks">
      <h2 class="heading">Almonds</h2>
      <a href="" target="_blank"><img src="Almonds-soaked.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 799.00</h3>
      <button type="submit" name="almonds" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
    <div class="blocks">
      <h2 class="heading">Cashew</h2>
      <a href="" target="_blank"><img src="cashew.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 729.00</h3>
      <button type="submit" name="cashew" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
    <div class="blocks">
      <h2 class="heading">Raisin</h2>
      <a href="" target="_blank"><img src="kishmish.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 589.00</h3>
      <button type="submit" name="raisin" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
    <div class="blocks">
      <h2 class="heading">Dates</h2>
      <a href="" target="_blank"><img src="dates.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 849.00</h3>
      <button type="submit" name="dates" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
    <div class="blocks">
      <h2 class="heading">Walnut</h2>
      <a href="" target="_blank"><img src="walnut.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 719.00</h3>
      <button type="submit" name="walnut" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
    <div class="blocks">
      <h2 class="heading">Pistachio </h2>
      <a href="" target="_blank"><img src="Pistachio.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 799.00</h3>
      <button type="submit" name="pistachio" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
    <div class="blocks">
      <h2 class="heading">Pine Nut</h2>
      <a href="" target="_blank"><img src="pinenut.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 699.00</h3>
      <button type="submit" name="pine_nut" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
    <div class="blocks">
      <h2 class="heading">Saffron</h2>
      <a href="" target="_blank"><img src="Saffron.jpg" alt="Not Supporting" class="blockpics"></a>
      <h3 id="price">Rs. 2789.00</h3>
      <button type="submit" name="saffron" class="btn btn-outline-warning" id="cart">Add to Cart</button>
    </div>
  </div>
  </form>
  <div id="backtotop">
    <a href="#ad" id="anchor">Back to Top</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <footer>
      Copy Rights Inc.
    </footer>
</body>
</html>