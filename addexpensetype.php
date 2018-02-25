<?php
session_start();
if (!isset($_SESSION["u_id"])) {
    header("location: ./");
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
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border-radius: 4px;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <?php
        require_once './connection.php';

        if (isset($_POST['expensetype'])) {

            $sql = "INSERT INTO category (categorytype)
    VALUES ('" . $_POST["expensetype"]."')";

            $result = mysqli_query($conn, $sql);
            
            header("location:addexpensetype.php");
             $message = "Sign Up successful";
  echo "<script type='text/javascript'>alert('$message');</script>";
        }
        ?>

        <div id="header">
            <h1>Expense Manager</h1>
            <div class="group">
                <a href="home.php">Back</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <div id="content5" style="width: 400px; margin: 0 auto;" >

            <form method="POST" action="addexpensetype.php" style="margin-top:40%">
                <h1> Add Category  </h1>
                Add New Category Type  :<br>
                <input style="width:100%" type="text" name="expensetype" autocomplete="off"placeholder="type">
                <input type="submit" name="addExpense" style="padding: 5px 20px; font-weight: bold" value="Add">
            </form> 
        </div>
    </body>
</html>
