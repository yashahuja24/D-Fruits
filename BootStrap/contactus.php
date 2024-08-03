<?php
include("./db_con.php");
include("./function.php");

session_start();
if(isset($_REQUEST['submit'])){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];

        $sql="INSERT INTO customers (name,email,message) values('$name','$email','$message')";
        if(mysqli_query($conn,$sql)){
            my_alert("success","New Record Created Successfully");
        } else{
            my_alert("danger","Error");
        }
    }
    mysqli_close($conn);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url(bodyimg.jpg);
        }
        .contact-form {
            margin: 50px auto;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            border: 1px solid #ffC107;
        }
        footer {
            background-color: #232F3E;
            color: white;
            height: 150px;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
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
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="4" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6iD4e3e1GIb6YJb4R7t2KK1T9UJ0"
        crossorigin="anonymous"></script>
    <footer>
        Copy Rights Inc.
    </footer>
</body>

</html>