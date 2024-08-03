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
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
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
    body 
    {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f3f3f3;
    }
    header 
    {
        background-color: #8b4513;
        color: white;
        text-align: center;
        padding: 1rem 0;
    }
    .container 
    {
        max-width: 1000px;
        margin: 2rem auto;
        padding: 1rem;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .cart-item 
    {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 1.5rem;
    }
    .cart-item img 
    {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 1rem;
    }
    .cart-info 
    {
        flex-grow: 1;
        position: relative;
        left:80px;
    }
    .cart-info h2 
    {
        margin: 0 0 0.5rem 0;
        color: #8b4513;
    }
    .cart-info p 
    {
        margin: 0.5rem 0;
        line-height: 1.5;
    }
    .quantity 
    {
        display: flex;
        align-items: center;
    }
    .quantity input 
    {
        width: 50px;
        text-align: center;
        margin: 0 0.5rem;
    }
    .remove 
    {
        background-color: #c0392b;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        cursor: pointer;
    }
    .total 
    {
        text-align: right;
        font-size: 1.5rem;
        color: #8b4513;
        margin-top: 1.5rem;
    }
    .checkout 
    {
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
    #proceed
    {
        position: relative;
        left: 290px;
        width: 325px;
    }
    .container
    {
        background-color: rgb(247, 234, 219);
    }
    h2,h1
    {
        color: #8b4513;
    }
    #img
    {
        position: relative;
        left:30px;
        height:150px;
        width: 150px;
        border-radius: 50px;
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Contact us</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="contactus.php">Customer Support</a></li>
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
    <div class="container">
    <?php
    $db_user_id=$_SESSION['id'];
    $sql="SELECT id,COUNT(quantity) as total_quantity,item,price FROM cart Where item_id='$db_user_id' GROUP BY item ";
    $run_sql=mysqli_query($conn,$sql);
    $total_price=0;
    
            if(isset($_REQUEST['proceed'])){
                my_alert("success","Order Placed Successfully");
                $del="TRUNCATE TABLE cart";
                $run=mysqli_query($conn,$del);
                if($run){
                ?>
                    <div class="cart-item">
                        <div class="cart-info">
                            <h2>Thank You For The Purchase</h2>
                            <div class="quantity">                    
                        </div>
                    </div>
                <?php
                }
            }
            else if(!isset($_REQUEST['proceed'])){
                if(mysqli_num_rows($run_sql)>0){
                    while($row=mysqli_fetch_assoc($run_sql)){
                        $total_quantity=$row['total_quantity'];
                        $total_item_price=$total_quantity*$row['price'];
        ?>
    
        <div class="cart-item">
            <img src="_97199041-f7f6-4844-9614-befcd894273f.jpg" alt="Almonds and Walnuts" id="img">
            <div class="cart-info">
                <h1><?php echo ucfirst($row['item']) ?></h1>
                <!-- <p>A powerhouse of nutrients, this combo is perfect for boosting brain health and providing a rich source of antioxidants.</p> -->
                <div class="quantity">
                    <h2><label for="quantity1">Quantity: <?php echo $row['total_quantity'] ?></label></h2>
                </div>
            </div>
            <a href="./delete.php?delete_id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-outline-warning" id="cart" style="width: 275px">Remove from Cart</button></a>
        </div>
        <hr>
   <?php
        $total_price+=$total_item_price;
        
        }
        ?>
        <div class="total">
            <h2>Total Amount: Rs. <?php echo $total_price ?></h2>
        </div>
        <?php
        
            ?>
            <form action="" method="POST">
            <button type="submit" name="proceed" class="btn btn-outline-success" id="proceed">Proceed to checkout</button>
            </form>
            <?php
        }
        else{
            ?>
            <div class="cart-item">
                <div class="cart-info">
                    <h2>OOPS!! Your Cart is Empty</h2>
                    <div class="quantity">                    
                </div>
            
        </div>
            <?php
        }
    
        mysqli_close($conn);
    }
    
    ?>
    
<?php

?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6iD4e3e1GIb6YJb4R7t2KK1T9UJ0"
        crossorigin="anonymous"></script>
</body>
</html>


<!-- <div class="cart-item">
            <img src="_97199041-f7f6-4844-9614-befcd894273f.jpg" alt="Almonds and Walnuts">
            <div class="cart-info">
                <h2>Cashews & Raisins</h2>
                <p>Enjoy the creamy texture of cashews paired with the natural sweetness of raisins. This combo is great for an energy boost.</p>
                <div class="quantity">
                    <label for="quantity2">Quantity:</label>
                    <input type="number" id="quantity2" name="quantity2" value="1" min="1">
                </div>
            </div>
            <button type="button" class="btn btn-outline-warning" id="cart">Remove</button>
        </div>
        <hr>
        <div class="cart-item">
            <img src="_97199041-f7f6-4844-9614-befcd894273f.jpg" alt="Almonds and Walnuts">
            <div class="cart-info">
                <h2>Pistachios & Dried Cranberries</h2>
                <p>A delicious and colorful mix, pistachios and dried cranberries provide a great balance of healthy fats and tart flavors.</p>
                <div class="quantity">
                    <label for="quantity3">Quantity:</label>
                    <input type="number" id="quantity3" name="quantity3" value="1" min="1">
                </div>
            </div>
            <button type="button" class="btn btn-outline-warning" id="cart">Remove</button>
        </div> -->