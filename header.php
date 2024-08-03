<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navbar navbar-inverse navabar-fixed-top mb-4">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand"><i class="fa fa-home"></i>Home</a>

        <?php
        if (!isset($_SESSION['admin']) && isset($_SESSION['email'])) {
            ?>
            <a href="products.php" class="navbar-brand">Shop</a>
            <a href="orders.php" class="navbar-brand">Orders</a>

            <?php
        }

        ?>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li class="search-form">
                <form action="products.php" method="GET">
                    <select type="text" name="search" id="search" class="search-input" placeholder="Search..."
                        style="background: white !important">
                        <?php
                        include 'connection.php';
                        $p = "SELECT DISTINCT productname FROM products";
                        $ex = $con->query($p);
                        if ($ex && $ex->num_rows > 0) {
                            while ($r = $ex->fetch_assoc()) {
                                $productName = $r['productname'];
                                $selected = isset($_POST['search']) && $_POST['search'] == $productName ? 'selected' : '';
                                echo "<option value='$productName' $selected>$productName</option>";
                            }
                        }
                        ?>
                    </select>


                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                </form>
            </li>
            <?php
            if (isset($_SESSION['email'])) {
                ?>
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php
            } else {
                ?>

                <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
            }

            if (isset($_SESSION['admin'])) {
                ?>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout Admin</a></li>
                <?php
            }
            if (!isset($_SESSION['admin'])) {
                ?>
                <a href="" class="navbar-brand">
                    <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>
                </a>


                <?php
            }
            ?>

        </ul>
    </div>

</nav>
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/jquery-editable-select@2.2.5/dist/jquery-editable-select.min.css">


<script src="https://cdn.jsdelivr.net/npm/jquery-editable-select@2.2.5/dist/jquery-editable-select.min.js"></script>
<script>
    $('#search').editableSelect();
</script>
<style>
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    .search-form {
        margin-top: 8px;
        margin-right: 15px;
    }

    .search-input {
        padding: 6px 20px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .search-btn {
        padding: 6px 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>