<?php
include("./db_con.php");
include("./function.php");

session_start();
$aq=1;
$cq=1;
$rq=1;
$dq=1;
$db_user_id=$_SESSION['id'];
if(isset($_REQUEST['almond_walnut'])){
  $a="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','almonds and walnuts','1389','$aq')";
  if(mysqli_query($conn,$a)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['cashew_raisin'])){
  $c="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','cashews and raisins','1289','$cq')";
  if(mysqli_query($conn,$c)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['pistachio_dried'])){
  $r="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','pistachios and dried cranberries','1499','$rq')";
  if(mysqli_query($conn,$r)){
    my_alert("success","Item Added Successfully");
} else{
    my_alert("danger","Error");
}
}
if(isset($_REQUEST['Date_fig'])){
  $d="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','dates and figs','1349','$dq')";
  if(mysqli_query($conn,$d)){
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
    <title>Exciting Combos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Exciting Dry Fruit Combos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }
        header {
            background-color: #8b4513;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .combo {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .combo img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        .combo-info {
            max-width: 700px;
        }

        .combo-info h2 {
            margin: 0 0 0.5rem 0;
            color: #8b4513;
        }

        .combo-info p {
            margin: 0.5rem 0;
            line-height: 1.5;
        }
        footer
        {
            background-color: #232F3E;
            color: white;
            height: 150px;
            width: 100%;
            text-align:center;
            display: flex;
            justify-content: center;
        }
        h5
        {
            color:#8b4513;
            font-weight: bold;
        }
        .container
        {
            background-color: rgb(247, 234, 219);
        }
    </style>
</head>

<body>
    <div id="ad">
        <p>Get exciting offers and prices on orders above Rs. 999</p>
    </div>
    <nav class="navbar navbar-expand-lg bg-light sticky-top" id="navbar">
        <div class="container-fluid">
            <a href="index.php"><img src="download (2).png" alt="NOt Supporting" height="100" width="130"
                    id="logo"></a>
            <div class="container-fluid">
            <form class="d-flex" role="search" method="POST" action='search.php'>
          <input class="form-control me-0.5" name="item_name" type="search" placeholder="Search D-Fruits" aria-label="Search"
            width="530px" id="searchbar">
          <button class="btn btn-outline-warning" name="submit" type="submit">Search</button>
        </form>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contactus.php">Customer Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Excitingcombos.php">Exciting Combos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">My Cart</a>
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
    <form action="" method="POST">
    <div class="container">
        <div class="combo">
            <img src="almwalnut.webp" alt="Almonds and Walnuts">
            <div class="combo-info">
                <h2>Almonds & Walnuts</h2>
                <p>A powerhouse of nutrients, this combo is perfect for boosting brain health and providing a rich
                    source of antioxidants.</p>
                <h5>Price: Rs. 1349.00</h4>
                    <button type="submit" name="almond_walnut" class="btn btn-outline-warning" id="cart">Add to Cart</button>
            </div>
        </div>
        <hr>
        <div class="combo">
            <img src="cashrai.webp" alt="Cashews and Raisins">
            <div class="combo-info">
                <h2>Cashews & Raisins</h2>
                <p>Enjoy the creamy texture of cashews paired with the natural sweetness of raisins. This combo is great
                    for an energy boost.</p>
                <h5>Price: Rs. 1289.00</h4>
                    <button type="submit" name="cashew_raisin" class="btn btn-outline-warning" id="cart">Add to Cart</button>
            </div>
        </div>
        <hr>
        <div class="combo">
            <img src="shiva.jpg" alt="Pistachios and Dried Cranberries">
            <div class="combo-info">
                <h2>Pistachios & Dried Cranberries</h2>
                <p>A delicious and colorful mix, pistachios and dried cranberries provide a great balance of healthy
                    fats and tart flavors.</p>
                <h5>Price: Rs. 1499.00</h4>
                    <button type="submit" name="pistachio_dried" class="btn btn-outline-warning" id="cart">Add to Cart</button>
            </div>
        </div>
        <hr>
        <div class="combo">
            <img src="moin.jpg" alt="Dates and Figs">
            <div class="combo-info">
                <h2>Dates & Figs</h2>
                <p>Rich in natural sugars and fiber, this combination is perfect for satisfying your sweet tooth while
                    keeping you full and energized.</p>
                <h5>Price: Rs. 1349.00</h4>
                    <button type="submit" name="Date_fig" class="btn btn-outline-warning" id="cart">Add to Cart</button>
            </div>
            <hr>
        </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6iD4e3e1GIb6YJb4R7t2KK1T9UJ0"
        crossorigin="anonymous"></script>
    <footer>
        Copy Rights Inc.
    </footer>
</body>

</html>