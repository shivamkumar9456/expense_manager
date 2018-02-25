<html>
    <head>
        <link rel="stylesheet" href="expenense.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        session_start();
        
        require_once './connection.php';
        
        if (isset($_POST['save'])) {

            $sql = "INSERT INTO user (user_name, password, name, email, contact)
    VALUES ('" . $_POST["UserName"] . "','" . $_POST["Password"] . "','" . $_POST["Name"] . "','" . $_POST["email"] . "','" . $_POST["contact"] . "')";

            $result = mysqli_query($conn, $sql);
            
            $_SESSION['messageForUser'] = "<script type='text/javascript'>alert('Sign Up successful');</script>";
            
            header("Location: index.php");   
        }
        ?>
        <div id="header">
            <h1>Daily Expense Manager</h1>
            <div class="group">

                <a href="index.php">Login</a>
            </div>
        </div>
        <div id="content1"style="width: 400px; margin: 0 auto;">

            <form style="margin-top: 25%" method="post">

                <h1> SignUp </h1>
                <b>Name:</b><br>
                <input style="width: 100%" type="text" name="Name" required autocomplete="off">
                <br><br>
                <b>Contact</b><br>
                <input style="width:100% "input type="tel" name="contact" required pattern="^\d{10}$" autocomplete="off">
                <br><br>
                <b>Email_id</b><br>
                <input style="width:100% "type="email" name="email" required autocomplete="off">
                <br><br>
                <b>Username:</b><br>
                <input style="width: 100%" type="text" name="UserName" required autocomplete="off">
                <br><br>
                <b>Password:</b><br>
                <input style="width: 100%"type="password" name="Password" required autocomplete="off">
                <br><br>
                <input type="submit" name="save" style="padding: 5px 20px; font-weight: bold" value="Sign up">
            </form> 

        </div>



    </body>
</html>
