<?php
session_start();
require 'connection.php';
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

    
    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $invoice_no = $_POST['invoice_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $payment_method = $_POST['payment_method'];
    $cc_name = $_POST['cc_name'];
    $cc_number = $_POST['cc_number'];
    $cc_expiration = $_POST['cc_expiration'];
    $cc_cvv = $_POST['cc_cvv'];
    $productNames = $_POST['productname'];
    $prices = $_POST['price'];
    $quantities = $_POST['quantity'];
    $totalAmts = $_POST['totalamt'];

    // Calculate total bill amount
    $total_bill = array_sum($totalAmts);

    // Output the bill
    echo "<h2>Invoice</h2>";
    echo "<p><strong>Invoice Number:</strong> $invoice_no</p>";
    echo "<p><strong>Name:</strong> $first_name $last_name</p>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Address:</strong> $address, $address2</p>";
    echo "<p><strong>Payment Method:</strong> $payment_method</p>";
    echo "<p><strong>Credit Card Name:</strong> $cc_name</p>";
    echo "<p><strong>Credit Card Number:</strong> $cc_number</p>";
    echo "<p><strong>Credit Card Expiration:</strong> $cc_expiration</p>";
    echo "<p><strong>Credit Card CVV:</strong> $cc_cvv</p>";

    // Output the purchased items
    echo "<h3>Items Purchased:</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total Amount</th></tr>";
    for ($i = 0; $i < count($productNames); $i++) {
        echo "<tr>";
        echo "<td>" . $productNames[$i] . "</td>";
        echo "<td>" . $prices[$i] . "</td>";
        echo "<td>" . $quantities[$i] . "</td>";
        echo "<td>" . $totalAmts[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Output total bill amount
    echo "<h3>Total Bill Amount: $total_bill</h3>";
} else {
    // Redirect to the checkout page if the form is not submitted
    header('location: checkout.php');
    exit();
}
?>
