<?php
session_start();
include("./db_con.php");
include("./function.php");

if(isset($_REQUEST['login'])){
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $login="SELECT * FROM users WHERE username='$username' ";
    $run_login=mysqli_query($conn,$login);
    if(mysqli_num_rows($run_login)==1){
        $row=mysqli_fetch_assoc($run_login);
        $db_user_id=$row['id'];
        $db_user_name=$row['username'];
        $db_user_pass=$row['password'];
        if($password==$db_user_pass){
            $_SESSION['name']=$db_user_name;
            $_SESSION['id']=$db_user_id;
            $_SESSION['is_login']=true;
            header("Location: index.php");
        }
        else{
            my_alert("danger","Incorrect Password");
        }
    }
    else{
        my_alert("danger","User not found");
    }
    mysqli_close($conn);

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="register.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(bodyimg.jpg);
            background-repeat:no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffedcc;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            border: 1px solid #fb8c00 ;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff9800;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #ff9800;
        }
        input[type="text"], input[type="password"] , input[type="email"]{
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ff9800;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #fb8c00;
        }
        .toggle-btn {
            background-color: #fb8c00;
            margin-top: 10px;
        }
        .toggle-btn:hover {
            background-color: #fb8c00;
        }
    </style>
</head>
<body>
    <div>
        <a href="index.html"><img src="download (2).png" alt="Not Supporting" height="100" width="130" id="logo"></a>
    </div>
    <div class="container" id="form-container">
        <h2>Login for D-Fruits</h2>
        <form id="register-form" method="POST">
            <div class="form-group">
                <label for="password">E-MAIL:</label>
                <input type="email" id="password" name="username" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button></a>
            <a href="register.php"><button type="button" class="toggle-btn">Don't have an account? Register</button></a>
        </form>
    </div>
</body>
</html>
