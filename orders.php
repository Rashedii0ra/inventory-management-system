<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";

    
    $c_id = $_POST['c_id'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    
   mysqli_query($mysqli, "INSERT INTO orders(c_id,title,quantity,price,total) VALUES('$c_id', '$title', '$quantity', '$price' ,' $total')") or die(mysqli_error($mysqli));


   header("Location: orders.php");
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styledash.css">
    <link rel="stylesheet" href="tables/css/bootstrap.min.css">
    <link rel="stylesheet" href="complete.css">
</head>
<body>
    <header>
        <div class="navbar">
            <a class="hello" id="logo">SmartInv</a>
            <a class="hello" href="Dashboard.php">Home</a>
            <a class="hello" href="Inventory.php">Inventory</a>
            <a class="hello" href="orders.php">Orders</a>
            <a class="hello" href="suppliers.php">Supplier</a>
            <a class="hello" href="customer.php">Customer</a>
            <a class="hello" href="login.php" id="logout">Logout</a>
        </div>
    </header>
    <main class="content">
    <p id="headingss">Orders Tab</p>
         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <!-- <div class="orderfields">
            <input id="ord_id" placeholder="Enter Order Id">
        </div> -->
        <div class="orderfields">
            <input id="c_id" name='c_id' placeholder="Enter Customer Id" required>
        </div>
        <div class="orderfields">
            <input id="title" name='title' placeholder="Enter Title" required>
        </div>
        <div class="orderfields">
            <input id="quantity" name='quantity' placeholder="Enter Quantity" required>
        </div>
        <div class="orderfields">
            <input id="price" name='price' placeholder="Enter Price" required>
        </div>
        <div class="orderfields">
            <input id="total" name='total' placeholder="Enter Total Price" required>
        </div>
        <div class ="orderfields">
            <button id="addbtn">Add</button>
        </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ORDER ID</th>
                    <th scope="col">CUSTOMER ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">TOTAL PRICE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $mysqli = require __DIR__ . "/database.php";
                $result = mysqli_query($mysqli, "SELECT * FROM orders") or die(mysqli_error($mysqli));
                while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['ord_id'] ?></td>
                    <td><?php echo $row['c_id'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['total'] ?></td>
                </tr>
             <?php } ?>
            </tbody>
        </table>
    </main>
    <footer id="footer">
    <script src="tables/js/bootstrap.bundle.min.js"></script>
    </footer>
    
</body>
</html>