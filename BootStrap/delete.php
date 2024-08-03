<?php
include("./db_con.php");
include("./function.php");

session_start();

if(isset($_REQUEST['delete_id'])){
    $delete_id=$_REQUEST['delete_id'];
    $del="DELETE FROM cart where id='$delete_id'";
    $run_del=mysqli_query($conn,$del);
    if($run_del){
        header("Location: cart.php");
    }
    else{
        my_alert("danger","Error");
    }
    mysqli_close($conn);
}
