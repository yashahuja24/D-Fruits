<?php
include("./db_con.php");
include("./function.php");

session_start();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
    footer {
        background-color: #232F3E;
        color: white;
        height: 150px;
        width: 100%;
        text-align: center;
        display: flex;
        justify-content: center;
    }
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
        background-color: rgb(247, 234, 219);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 1.5rem;
    }
    .cart-item img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 1rem;
    }
    .cart-info {
        flex-grow: 1;
    }
    .cart-info h2 {
        margin: 0 0 0.5rem 0;
        color: #8b4513;
    }
    .cart-info p {
        margin: 0.5rem 0;
        line-height: 1.5;
    }
    .quantity {
        display: flex;
        align-items: center;
    }
    .quantity input {
        width: 50px;
        text-align: center;
        margin: 0 0.5rem;
    }
    .remove {
        background-color: #c0392b;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        cursor: pointer;
    }
    .total {
        text-align: right;
        font-size: 1.5rem;
        color: #8b4513;
        margin-top: 1.5rem;
    }
    .checkout {
        display: block;
        background-color: #27ae60;
        color: white;
        text-align: center;
        padding: 1rem;
        margin-top: 1rem;
        text-decoration: none;
        font-size: 1.25rem;
        border-radius: 5px;
    }
    #des
    {
        color: black;
        position: relative;
        top:10px;
    }
    #img
    {
        border-radius:35px;
        height:130px;
        width:130px;
    }
    h1,h2
    {
        color: #8b4513;
        position: relative;
        top:10px;
    }
    #proceed
    {
        position: relative;
        left: 325px;
        width: 300px;
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
                <form class="d-flex" role="search" method="POST" action="search.php">
                    <input class="form-control me-0.5" type="search" placeholder="Search D-Fruits" aria-label="Search"
                        width="530px" id="searchbar" name="item_name">
                    <button class="btn btn-outline-warning" name="submit" type="submit">Search</button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Contact us</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">About us</a></li>
                            <li><a class="dropdown-item" href="#">Customer Support</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Excitingcombos.php">Exciting Combos</a>
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
<?php
if(isset($_REQUEST['submit'])){
    $item_name=$_REQUEST['item_name'];
    $fetch="SELECT * FROM records where item_name='$item_name'";
    $run_fetch=mysqli_query($conn,$fetch);
    if(mysqli_num_rows($run_fetch)>0){
        while($row=mysqli_fetch_assoc($run_fetch)){
            $db_item_name=$row['item_name'];
            $db_item_price=$row['item_price'];
            $db_item_desc=$row['description'];

?>
    <div class="container">
        <form action="" method="POST">
        <div class="cart-item">
        <img src="_97199041-f7f6-4844-9614-befcd894273f.jpg" alt="..." id="img">
            <div class="cart-info">
                <h1><?php echo ucfirst($db_item_name) ?></h1>
                <p id="des"><?php echo $db_item_desc ?></p>
                <div class="quantity">
                    <h2><label for="price">Price:Rs. <?php echo $db_item_price ?></label></h2>
                </div>
            </div>
            <button type="submit" name="cart" value="<?php echo $item_name ?>" class="btn btn-outline-warning" id="cart" style="width:350px">Add to Cart</button>
        </div>
        </form>
        </div>
<?php
        
}
}
}

if(isset($_REQUEST['cart'])){
    $db_user_id=$_SESSION['id'];
$aq=1;
    $item_name=$_REQUEST['cart'];
    $fetch="SELECT * FROM records where item_name='$item_name'";
    $run_fetch=mysqli_query($conn,$fetch);
    if(mysqli_num_rows($run_fetch)>0){
        while($row=mysqli_fetch_assoc($run_fetch)){
            $db_item_name=$row['item_name'];
            $db_item_price=$row['item_price'];
            $db_item_desc=$row['description'];

    $a="INSERT INTO cart (item_id,item,price,quantity) values('$db_user_id','$db_item_name','$db_item_price','$aq')";
    if(mysqli_query($conn,$a)){
      my_alert("success","Item Added Successfully");
  } else{
      my_alert("danger","Error");
  }
  }
}
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6iD4e3e1GIb6YJb4R7t2KK1T9UJ0"
        crossorigin="anonymous"></script>
</body>
</html>