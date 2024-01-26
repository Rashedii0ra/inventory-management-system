<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";

    
    $sup_name = $_POST['sup_name'];
    $sup_add = $_POST['sup_add'];
    $sup_phoneno = $_POST['sup_phoneno'];
    $sup_item = $_POST['sup_item'];
   mysqli_query($mysqli, "INSERT INTO suppliers(sup_name,sup_add,sup_phoneno,sup_item) VALUES('$sup_name', '$sup_add', '$sup_phoneno', '$sup_item')") or die(mysqli_error($mysqli));


   header("Location: suppliers.php");
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
        <p id="headingss">Suppliers Tab</p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <!-- <div class="supplierfields">
                <input id="sup_id" placeholder="Enter Supplier Id">
            </div> -->
            <div class="supplierfields">
                <input id="sup_name" name='sup_name' placeholder="Enter Supplier Name" required>
            </div>
            <div class="supplierfields">
                <input id="sup_add" name='sup_add' placeholder="Enter Supplier Address" required>
            </div>
            <div class="supplierfields">
                <input id="sup_phoneno" name='sup_phoneno' placeholder="Enter Supplier PhoneNo" required>
            </div>
            <div class="supplierfields">
                <input id="sup_item" name='sup_item' placeholder="Enter Supplied Item" required>
            </div>
            <div class ="supplierfields">
                <button id="addbtn">Add</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SUPPLIER ID</th>
                    <th scope="col">SUPPLIER NAME</th>
                    <th scope="col">SUPPLIER ADDRESS</th>
                    <th scope="col">SUPPLIER PHONE NO.</th>
                    <th scope="col">SUPPLIER ITEM</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $mysqli = require __DIR__ . "/database.php";
                $result = mysqli_query($mysqli, "SELECT * FROM suppliers") or die(mysqli_error($mysqli));
                while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['sup_id'] ?></td>
                    <td><?php echo $row['sup_name'] ?></td>
                    <td><?php echo $row['sup_add'] ?></td>
                    <td><?php echo $row['sup_phoneno'] ?></td>
                    <td><?php echo $row['sup_item'] ?></td>
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