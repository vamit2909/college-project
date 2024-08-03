<?php
    require 'connection.php';
    session_start();

    // Check if the 'id' parameter is set in the URL
    if(isset($_GET['id'])) {
        $item_id = $_GET['id'];
        $item_name=$_GET['item_name'];
        $price = $_GET['price'];
        
        // Check if the user is logged in
        if(isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];

            // Use prepared statement to prevent SQL injection
            $add_to_cart_query = "INSERT INTO users_items (user_id, item_id, status) VALUES (?, ?, 'Added to cart')";
            $stmt = mysqli_prepare($con, $add_to_cart_query);
            

            $sql = "insert into items (user_id, name, price) Values ('$user_id','$item_name' ,'$price'); ";
            $execute = $con->query($sql);


            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);

            // Execute the statement
            if(mysqli_stmt_execute($stmt)) {
                // Item added to cart successfully
                header('location: products.php');
                exit(); // Ensure that no further code is executed after the redirect
            } else {
                // Error occurred during execution
                echo "Error: " . mysqli_error($con);
            }
        } else {
            // User is not logged in
            echo "User not logged in. Please log in to add items to the cart.";
        }
    } else {
        // 'id' parameter is not set in the URL
        echo "Item ID not provided.";
    }
?>
