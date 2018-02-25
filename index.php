<?php
session_start();

require_once './connection.php';

if (isset($_POST["submit"])) {

    $username = $_POST['UserName'];
    $password = $_POST['Password'];
//Check username and password from database
    $sql = "SELECT u_id FROM user WHERE user_name='$username' and password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION["u_id"] = $row['u_id'];
        header("Location: home.php");
        
    } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
$conn->close();
?>
<html>
    <head>
        <link rel="stylesheet" href="expenense.css">
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>

        <div id="header">
            <h1>Expense Manager</h1>
            <div class="group">

                <a href="Signup.php">Sign Up</a>
            </div>
        </div>
        <div id="content" style="width: 400px; margin: 0 auto;" >


            <form action="index.php" method="POST" style="margin-top: 40%">

                <h1> Login Form </h1>
                <b>UserName:</b><br>
                <input style="width: 100%" type="text" name="UserName"  required autocomplete="off">
                <br><br>
                <b>Password:</b><br>
                <input style="width: 100%" type="password" name="Password"  required autocomplete="off">
                <br><br>
                <input type="submit" name="submit" style="padding: 5px 20px; font-weight: bold" value="Login">
            </form> 
        </div>


        <?PHP
        if (isset($_SESSION["messageForUser"]) && $_SESSION["messageForUser"] != null) {
            echo $_SESSION["messageForUser"];
            $_SESSION["messageForUser"] = null;
        }
        ?>
    </body>
</html>
