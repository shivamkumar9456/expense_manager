<? php
session_start();
if (!isset($_SESSION["u_id"])) {
    header("location: ./");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="expenense.css">
        <meta charset="UTF-8">
        <style>
            img {
                border-radius: 50%;
                background-color: transparent;
                box-shadow: 5px 5px 10px 10px rgba(0, 0, 0, 0.5);   
                max-width: 200px;
            }
            img:hover {
                box-shadow: 5px 5px 10px 10px white;   
            }

        </style>
        <title></title>
    </head>
    <body>
        <div id="header">
            <h1>Daily Expense Manager</h1>
            <div class="group">
                <a href="home.php">Back</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <div id="content3">
            <a href="viewprofile.php" class="option">
                <div >
                    <img src='image/view.png'>
                    <div class="title"> Veiw Profile</div>
                </div>
            </a>
            <a href="edit.php" class="option">
                <div >
                    <img src='image/edit.png'>
                    <div class="title"> Edit Profile</div>
                </div>
            </a>

        </div>
    </body>
</html>
