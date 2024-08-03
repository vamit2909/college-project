<?php
session_start();

require 'connection.php';
try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=localhost;dbname=store", 'root', '');

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    // You might want to terminate execution here if the connection fails
    exit();
}


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div>
        <?php
        require 'header.php';
        if(isset($_POST['delete'])) {
            // Delete the product with the given ID
            $id = $_POST['idd'];
            $delete_sql = "DELETE FROM products WHERE id='$id'";
            $delete_result = mysqli_query($con, $delete_sql);
        
            if($delete_result) {
                // Success message
                echo "<script>alert('Product deleted successfully.');</script>";
                ?>
                <script> window.location.href="admin_panel.php"; </script>
                <?php
            } else {
                echo "Error deleting product: " . mysqli_error($con);
            }
        }


        if(isset($_POST['edit'])) {
            // Update the product with the given ID
            $id = $_POST['idd'];
            $productname = $_POST['productname'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
        
            $update_sql = "UPDATE products SET productname=?, price=?, quantity=? WHERE id=?";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([$productname, $price, $quantity, $id]);
            
            if($update_stmt->rowCount() > 0) {
                // Success message
                echo "<script>alert('Product updated successfully.');</script>";
                echo "<script>window.location.href='edit_image.php?id=$id';</script>";
            } else {
                echo "Error updating product.";
            }
        }
  

       
        ?>
        <br>



<div class="container mt-4" style="    margin-top: 3%;">
    <?php
     $id = $_GET['id'];  
    $sql ="SELECT * FROM products where id='$id' ";
    $ex = mysqli_query($con, $sql);
    if(mysqli_num_rows($ex) > 0) {
        while($row = mysqli_fetch_assoc($ex)) {
            ?>
            <div class="col-sm-3">
                <form method="post">
                    <div class="card" style="width: max-content; border: 1px solid black">
                        <!-- Set a fixed height for the card image -->
                        <img src="<?php echo $row['imagepath']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;padding: 13px;border-radius: 21px;" alt="...">
                    
                        <ul class="list-group list-group-flush">
                           
                            <li class="list-group-item">
                                <input type="text" style="display: none" name="idd" value="<?php echo $row['id']; ?>">
                            </li>
                            <li class="list-group-item">
                                <input type="text" name="productname" value="<?php echo $row['productname']; ?>">
                            </li>
                            <li class="list-group-item">
                                <input type="text" name="price" value="<?php echo $row['price']; ?>">
                            </li>

                            <li class="list-group-item">
                                <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>">
                            </li>

                                
                                <button class="btn btn-danger" name="edit" type="submit">Edit</button>
                                <button class="btn btn-danger" name="delete" type="submit">Delete</button>
                            </li>
                        </ul>

                    </div>
                </form>
            </div>
            <?php
        }
    }



    ?>
</div>





    </div>
</body>

</html>