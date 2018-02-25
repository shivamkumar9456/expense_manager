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
                <a href="logout.php">logout</a>
            </div>
        </div>
        <div id="content2">
            <a href="profile.php" class="option">
                <div >
                    <img src='image/profile.png'>
                    <div class="title">Profile</div>
                </div>
            </a>
            <a href="allexpenses.php" class="option">
                <div >
                    <img src='image/images.jpg'>
                    <div class="title">All Expense</div>
                </div>
            </a>
            <a href="todayentry.php" class="option">

                <div >
                    <img src='image/notes.png'>
                    <div class="title">Today's Entry</div>
                </div>
            </a>
            <br>
            <a href="addexpensetype.php" class="option">
                <div >
                    <img src='image/images.png'>
                    <div class="title">Add New Expense type </div>
                </div>
            </a>
            <a href="about.php" class="option">
                <div >
                    <img src='image/icons_about.png'>
                    <div class="title">About</div>
                </div>
            </a>
        </div>
    </body>
</html>
