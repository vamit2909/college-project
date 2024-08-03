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

<?php
// Define variables and initialize with empty values
$productName = $price = $quantity = "";
$productName_err = "";
$success_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate product name
    if (empty(trim($_POST["productName"]))) {
        $productName_err = "Please enter product name.";
    } else {
        $productName = trim($_POST["productName"]);
    }

    // Check if product name is not empty and other fields are set
    if (empty($productName_err) && isset($_POST["price"]) && isset($_POST["quantity"])) {
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        // Check if image was uploaded successfully
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $uploadDir = "uploads/";
            $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
                $imagePath = $uploadFile;
            } else {
                $imagePath = "";
                $error_message = "Error uploading image.";
            }
        } else {
            $imagePath = "";
            $error_message = "No image uploaded or upload error occurred.";
        }

        // Check if product name already exists
        $sql_check_product = "SELECT COUNT(*) AS count FROM products WHERE productname = ?";
        $stmt_check_product = $pdo->prepare($sql_check_product);
        $stmt_check_product->execute([$productName]);
        $result = $stmt_check_product->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            $productName_err = "Product name already exists.";
        }

        // If no errors, insert the product into the database
        if (empty($productName_err) && empty($error_message)) {
            $sql = "INSERT INTO products (productname, price, quantity, imagepath) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$productName, $price, $quantity, $imagePath])) {
                $success_message = "Product added successfully!";
            } else {
                $error_message = "Error adding product to the database.";
            }
        }
    }
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
        ?>

        <br>
        <form method="post" enctype="multipart/form-data">
            <div class="container mt-4" style="margin-top: 4%">


                <!-- Rest of your form here -->

                <?php if (!empty($success_message)) { ?>
                    <script>
                        alert('<?php echo $success_message; ?>');
                    </script>
                <?php } ?>

                <div class="mb-3 row mt-4">
                    <label for="productName" class="col-sm-2 col-form-label">Product name</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?php echo (!empty($productName_err)) ? 'is-invalid' : ''; ?>"
                            id="productName" name="productName" value="<?php echo $productName; ?>">
                        <span class="invalid-feedback" style="color: red">
                            <?php echo $productName_err; ?>
                        </span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>


                <div class="mb-3 row mt-3">
                    <div class="" style="margin: auto;width: max-content; margin-top: 1%">
                        <button class="btn btn-primary" type="submit">Add Product</button>
                    </div>
                </div>

            </div>
        </form>



       


<div class="container-fluid mt-4" style="    margin-top: 3%;">
    <?php
    $sql ="SELECT * FROM products";
    $ex = mysqli_query($con, $sql);
    if(mysqli_num_rows($ex) > 0) {
        while($row = mysqli_fetch_assoc($ex)) {
            ?>
            <div class="col-sm-3">
                <form method="post">
                    <div class="card" style="width: inherit; border: 1px solid black">
                        <!-- Set a fixed height for the card image -->
                        <img src="<?php echo $row['imagepath']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;padding: 13px;border-radius: 21px;     width: -webkit-fill-available;" alt="...">
                    
                        <ul class="list-group list-group-flush">
                            <input type="text" style="display: none" value="<?php echo $row['id']; ?>">
                            <li class="list-group-item">Name: <b><?php echo $row['productname']; ?></b></li>
                            <li class="list-group-item">Price: <?php echo $row['price']; ?></li>
                            <li class="list-group-item">Total Quantity : <?php echo $row['quantity']; ?></li>
                            <li class="list-group-item">
                                <a class="btn btn-primary" href="edit_image.php?id=<?php echo $row['id']; ?>">Edit </a>
                                <a class="btn btn-primary" href="edit_image.php?id=<?php echo $row['id']; ?>">Delete </a>
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