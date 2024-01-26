<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    mysqli_query($mysqli, "INSERT INTO inventory(title,quantity,price) VALUES('$title','$quantity', '$price')") or die(mysqli_error($mysqli));

    header("Location: inventory.php");
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
            <a id="logo">SmartInv</a>
            <a href="Dashboard.php">Home</a>
            <a href="Inventory.php">Inventory</a>
            <a href="orders.php">Orders</a>
            <a href="suppliers.php">Supplier</a>
            <a href="customer.php">Customer</a>
            <a href="login.php" id="logout">Logout</a>
        </div>
    </header>
    <main class="content">
        <p id ="headingss">Inventory Tab</p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <!-- <div class="inventoryfields">
                <input id="sku" placeholder="Enter SKU">
            </div> -->
            <div class="inventoryfields">
                <input id="title" name="title" placeholder="Enter Title" required>
            </div>
            <div class="inventoryfields">
                <input id="quantity" name="quantity" placeholder="Enter Quantity" required>
            </div>
            <div class="inventoryfields">
                <input id="price" name="price" placeholder="Enter Price" required>
            </div>
            <div class="inventoryfields">
                <button type="submit" id="addbtn">Add</button>
            </div>

        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SKU ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">PRICE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $mysqli = require __DIR__ . "/database.php";
                $result = mysqli_query($mysqli, "SELECT * FROM inventory") or die(mysqli_error($mysqli));
                while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['sku_id'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                </tr>
             <?php } ?>
            </tbody>
        </table>
    </main>

    <footer id="footer">
    <script src="tables/js/bootstrap.bundle.min.js"></script>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>

</html>