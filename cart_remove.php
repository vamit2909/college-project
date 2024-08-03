<?php
    require 'connection.php';
    session_start();
    $useremail = $_SESSION['email'];
    $p_id=$_GET['id'];
    $delete_query="delete from cart where user='$useremail' and product_id='$p_id'";
    $ex = $con->query($delete_query);
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
    header('location: cart.php');
?>