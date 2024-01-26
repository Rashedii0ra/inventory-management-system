<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";

    
    $c_name = $_POST['c_name'];
    $c_add = $_POST['c_add'];
    $c_phoneno = $_POST['c_phoneno'];
    
   mysqli_query($mysqli, "INSERT INTO customer(c_name,c_add,c_phoneno) VALUES('$c_name', '$c_add', '$c_phoneno')") or die(mysqli_error($mysqli));


   header("Location: customer.php");
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
    <p id="headingss">Customers Tab</p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <!-- <div class="customerfields">
                <input id="c_id" placeholder="Enter Customer Id">
            </div> -->
            <div class="customerfields">
                <input id="c_name" name='c_name'placeholder="Enter Customer Name" required>
            </div>
            <div class="customerfields">
                <input id="c_add" name='c_add' placeholder="Enter Customer Address" required>
            </div>
            <div class="customerfields">
                <input id="c_phoneno" name='c_phoneno' placeholder="Enter Customer Phone No." required>
            </div>
            <div class ="customerfields">
                <button id="addbtn">Add</button>
            </div>
        
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">CUSTOMER ID</th>
                    <th scope="col">CUSTOMER NAME</th>
                    <th scope="col">CUSTOMER ADDRESS</th>
                    <th scope="col">CUSTOMER PHONE NO.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $mysqli = require __DIR__ . "/database.php";
                $result = mysqli_query($mysqli, "SELECT * FROM customer") or die(mysqli_error($mysqli));
                while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['c_id'] ?></td>
                    <td><?php echo $row['c_name'] ?></td>
                    <td><?php echo $row['c_add'] ?></td>
                    <td><?php echo $row['c_phoneno'] ?></td>
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