<?PHP
session_start();
if (!isset($_SESSION["u_id"])) {
    header("location: ./");
}
require_once './connection.php';
$userid = $_SESSION["u_id"];
if (isset($_POST['addExpense'])) {
    $cid = $_POST["c_id"];
    $amount = $_POST["amount"];
    $date = date("d-m-Y");
    $sql = "INSERT INTO money (c_id, u_id, amount, entry_date) 
    VALUES ($cid, $userid, $amount, '$date')";
    $result = mysqli_query($conn, $sql);
 if ($result) {
 $message = "entry successfull";
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
            form {
                margin-top: 20%;
                padding: 10px 30px 30px 30px; 
                background-color: whitesmoke; 
                box-shadow: 0 2px 4px 3px #999; 
                border-radius: 20px;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <h1>Expense Manager</h1>
            <div class="group">

                <a href="home.php">Back</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <div id="content" style="width: 400px; margin: 0 auto;" >
        </div>
        <div style="width: 400px; margin: 10px auto;">
            <form style="" name="form_update" method="post" action="todayentry.php">
                <h1> Expense </h1>

                <b>Type</b><br>
                <?php
                require_once './connection.php';
                echo "<select name='c_id' style='width: 100%'>";
                echo '<option value="">' . '--- Please Select category type ---' . '</option>';
                $query = mysqli_query($conn, "SELECT * FROM category");
                while ($row = mysqli_fetch_array($query)) {
                    echo "<option value='" . $row['c_id'] . "'>" . $row['categorytype']
                    . '</option>';
                }
                echo '</select>';
                ?>
                <br><br>
                <b>Amount</b><br>
                <input style="width:100%" type="number" name="amount" autocomplete="off"placeholder="amount in rupees">
                <br><br>

                <input type="submit" name="addExpense" style="padding: 5px 20px; font-weight: bold" value="Add">
            </form>
        </div>

    </body>
</html>
