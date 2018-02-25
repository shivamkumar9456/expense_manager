<?php
session_start();
if (!isset($_SESSION["u_id"])) {
    header("location: ./");
}

require_once './connection.php';
if (isset($_POST['update'])) {
    $uid = $_SESSION["u_id"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

// mysql query to Update data
    $query = "UPDATE user SET name = '$name', email = '$email', contact = '$contact' WHERE u_id = $uid";

    $result = mysqli_query($conn, $query);

    if ($result) {
 $message = "updation successfull";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
}
?>
<html>
    <head>
        <link rel="stylesheet" href="expenense.css">
        <meta charset="UTF-8">
        <title></title>
        <style>
            input[type=text], 
            select {
                font-size: 20px;
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=email], 
            select {
                font-size: 20px;
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }


        </style>

    </head>
    <body>

        <div id="header">
            <h1>Daily Expense Manager</h1>
            <div class="group">

                <a href="profile.php">Back</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <div id="content4">
            <form action="edit.php" method="post"  Style="margin-top: 10%">

                New Name :<input type="text" name="name" required autocomplete="off"><br><br>

                Email :<input type="email" width="100%" name="email" required autocomplete="off"><br><br>

                Contact :<input type="text" name="contact" required autocomplete="off" pattern="^\d{10}$"><br><br>

                <input type="submit" name="update" value="Update Data">

            </form>


        </div>


    </body>
</html>
