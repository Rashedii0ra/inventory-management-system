<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    if ($user) {
        if ($_POST["password"] == $user["password"]) {
            header("Location: Dashboard.php");
            exit;
        }
    }
    
    
    $is_invalid = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
    <div >

    
        

        

        <?php if ($is_invalid): ?>
        <em>Invalid login</em>
         <?php endif; ?>

    <form  class ="logincontainer" method="post">
    <h1>LogIn</h1>
        <label for="username">username</label>
        
        <input  class = "input" type="username" name="username" id="username"
               value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input   class = "input" type="password" name="password" id="password">
        <button class="loginbtn">Log In</button>
        <p>Don't have an account yet? <a href="SignupPage.html">SignUp</a></p>
        </form>
    </div>
</body>
</html>






































<?php

//print_r($_POST);

// $email = $_POST['email'];
// $password = $_POST['password'];




// $serverName = "DESKTOP-E8LT2HC";
// $database = "authentication";


// $connection = array("Database" => $database,"email" => $email,"password" => $password);

// $conn = sqlsrv_connect($serverName,$connection);


// if($conn === false) {
//     die(print_r(sqlsrv_errors(), true));
// }

// // SQL query to fetch information of registerd users and finds user match.
// $query = sqlsrv_query($conn, "SELECT * FROM login WHERE password='$password' AND email='$email'");

// $rows = sqlsrv_num_rows($query);
// if($rows == 1) {
//     echo "Login successful";
// } else {
//     echo "Email or Password is invalid";
// }
// sqlsrv_close($conn);
// ?>



