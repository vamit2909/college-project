<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    $useremail=$_SESSION['email'];
    $user_products_query="select *  from invoices  where username='$useremail'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Orders</title>
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
        <br><br><br>
    </head>
    <body>
        <div>
            <?php 
               require 'header.php';
            ?>
            <br>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <form method="post">
                    <tbody>
                        <tr>
                           <th>check</th> 
                           <th>Invoice number</th>
                           <th>Customer name</th>
                           <th>Total Amount</th>
                        </tr>
                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                        $total_price = 0;
                       while($row=mysqli_fetch_array($user_products_result)){


                           
                                    ?>
                                     <tr>
                                        <th><input type="checkbox" name="id" value="<?php echo $row['id'] ?>" ></th>
                                        <th><?php echo $inv = $row['invoice_no']?></th>
                                        <th><?php echo $row['first_name']," ".$row['last_name'];?></th>
                                        <th><?php 

                                            $sql = " select price, quantity from invoice_items where username='$useremail' and invoiceno='$inv' ";
                                            $total_amt = 0;
                                            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                                            if(mysqli_num_rows($result)> 0){
                                                while($row = mysqli_fetch_array($result)){

                                                    $total_amt +=$row["price"]*$row['quantity'];
                                                    ?>
                                                        

                                                    <?php
                                                }
                                            }

                                            echo  $total_amt ;

                                        ?></th>
                                    </tr>
                                    <?php $counter=$counter+1;}?>
                                        
                                    <?php

                            ?>
                            
                           <tr>
                                <td>.</td>
                                <td>Total</td>
                                <td> <button class="btn btn-primary" name="submit" type="submit" >Submit</button> </td>
                                <td><?php echo  $total_price ?></td>
                           </tr>
                           
                       
                    </tbody>
                    </form>
                </table>
            </div>
            <?php

               

                           
            ?>
        </div>
        <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>t</scrip
                                          <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
                                          <script>new DataTable('.table');
                                          </script>

<?php

if(isset($_POST['productid'])){


?>
            
<div class="container">
  <form method="post">
  <main>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill"></span>
        </h4>
        <ul class="list-group mb-3">


        <?php

        $total = 0;


            $productid = $_POST['productid'];

            foreach ( $productid as $pid) {

                $sq = "select * from products where id='$pid' ";

                $ex = $con->query($sq);

           
if(mysqli_num_rows($ex) > 0) {
    while($row = mysqli_fetch_array($ex)) {
        $total += 1;
        $productname = $row["productname"];
        $productid = $row["id"]; // Assuming you have a product ID in your database
        ?>
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h4 class="my-0">Product name: <?php echo $productname; ?></h4>
                <input style="display: none;" type="text" name="productname[]" value="<?php echo $productname; ?>">
                <input type="text" name="price[]" value="<?php echo $row['price']; ?>"> <!-- Set value to product ID -->
                <input type="hidden" name="productid[]" value="<?php echo $productid; ?>"> <!-- Add product ID as hidden input -->
                <small class="text-body-secondary"></small>
            </div>
            <span class="text-body-secondary">Price: <?php echo $row['price']; ?></span>
            <div>
                <label for="">Quantity</label>
                <input style="display: inline" class="quantity" type="number" name="quantity[]">
            </div>
            <div>
                <label for="">Total Amt</label>
                <input style="display: inline" type="text" name="totalamt[]">
            </div>
        </li>
        <?php
    }
}


         
            

        }


        ?>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.quantity').on('input', function() {
                    var quantity = parseInt($(this).val());
                    var price = parseFloat($(this).closest('li').find('input[name="price[]"]').val());
                    var totalAmt = quantity * price;
                    $(this).closest('li').find('input[name="totalamt[]"]').val(totalAmt.toFixed(2));
                });
            });
        </script>

        </ul>

     
      </div>


        <?php
          if (isset($_POST['checkout'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $address2 = $_POST['address2'];
            $same_address = isset($_POST['same_address']) ? 1 : 0;
            $save_info = isset($_POST['save_info']) ? 1 : 0;
            $payment_method = $_POST['payment_method'];
            $cc_name = $_POST['cc_name'];
            $cc_number = $_POST['cc_number'];
            $cc_expiration = $_POST['cc_expiration'];
            $cc_cvv = $_POST['cc_cvv'];
            $invoice_no = $_POST['invoice_no'];
        
            // Construct the SQL query
            $sql = "INSERT INTO `invoices` 
                    (`first_name`, `last_name`, `username`, `email`, `address`, `address2`, `same_address`, `save_info`, `payment_method`, 
                    `cc_name`, `cc_number`, `cc_expiration`, `cc_cvv`, `invoice_no`) 
                    VALUES 
                    ('$first_name', '$last_name', '$username', '$email', '$address', '$address2', $same_address, $save_info, '$payment_method', 
                    '$cc_name', '$cc_number', '$cc_expiration', '$cc_cvv', '$invoice_no')";



                      $productNames = $_POST['productname'];
                      $prices = $_POST['price'];
                      $productIds = $_POST['productid'];
                      $quantities = $_POST['quantity'];
                      $totalAmts = $_POST['totalamt'];

                      for ($i = 0; $i < count($productNames); $i++) {
                          $product_name = mysqli_real_escape_string($con, $productNames[$i]);
                          $price = mysqli_real_escape_string($con, $prices[$i]);
                          $product_id = mysqli_real_escape_string($con, $productIds[$i]);
                          $quantity = mysqli_real_escape_string($con, $quantities[$i]);
                          $total_amt = mysqli_real_escape_string($con, $totalAmts[$i]);
                          
                          $insql = "INSERT INTO invoice_items (invoiceno, username, product_name, price, product_id, quantity, total_amt) 
                                    VALUES ('$invoice_no', '$username', '$product_name', '$price', '$product_id', '$quantity', '$total_amt')";
                          
                          $result = mysqli_query($con, $insql);
                          
                          
                          if ($result) {
                          } else {
                              echo "Error inserting data: " . mysqli_error($con);
                          }
                      }




            $result = $con->query($sql);
        
            if ($result) {
                ?>
                
                <script>
                  alert("Order placed successfully")
                </script>
                
                <?php
            } else {
              ?>
                
              <script>
                alert("Something went wromg <?php echo $con->error; ?>")
              </script>
              
              <?php
            }
        }
        


        ?>


      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
   
          <div class="row g-3">
          <div class="col-sm-2">

          <?php
          $invno = "";
          $useremail = $_SESSION['email'];
            $sql ="SELECT max(invoice_no) as invno FROM invoices where username='$useremail' ";
            $ex = mysqli_query($con, $sql);
            if(mysqli_num_rows($ex) > 0) {
                while($row = mysqli_fetch_assoc($ex)) {

                    $invno = $row["invno"]+1;
                }
            }else{
                $invno = 1;
            }
          ?>
              <label for="invoiceno" class="form-label">Invoice no</label>
              <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="" value="<?php echo  $invno; ?>" required>
              
            </div>
            <div class="col-sm-4">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="" required>
              
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="" required>
              
            </div>

            <div class="col-sm-6">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['email'];  ?>" placeholder="Username" readonly>
         
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
              
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
              
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
            </div>

            
          </div>

          <hr class="my-4">
          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" name="credit" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="payment_method" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" name="cc_name" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-body-secondary">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc_number" name="cc_number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" name="cc_expiration" id="cc_expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc_cvv" name="cc_cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" name="checkout" type="submit">Continue to checkout</button>
     
      </div>
    </div>
  </main>
  </form>

  <footer class="my-5 pt-5 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; Developed by Amit vishwakarma</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

<?php
}

?>




    </body>
</html>
<style>
body {
            background: skyblue;
        }

      
    </style>
