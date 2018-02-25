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
    </head>
    <body>

        <div id="header">
            <h1>Expense Manager</h1>
            <div class="group">

                <a href="home.php">back</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <div id="content">
            <center><h1>About Expanse manager </h1></center>
            <p style="font-size: 19px; text-align: center">A smarter way to manage and track your daily expenses.</p>
            <hr>
            <article style="padding: 40px; background-color: rgba(0, 0, 0, 0.4); color: lightgrey">
                <div>
                    <h2>Features</h2>
                    <ol>
                        <li>Add Expenses</li>
                        <li>Track expenses with category wise</li>
                        <li>User profile</li>
                    </ol>
                </div>
                <br>
                <div>
                    <h2>Requirements</h2>
                    <ol>
                        <li>PHP 7.0 or higher version</li>
                        <li>MySQL 10.1.30-MariaDB +</li>
                    </ol>
                </div>
                <br>
                <div>
                    <h2>Developer</h2>
                    <span style="font-size: 20px;">
                        Name : Shivam Kumar Verma <br>
                        Email : shivamkumar.kumar936@gmail.com
                    </span>
                </div>
            </article>
        </div>


    </body>
</html>
