<?php

$conn = mysqli_connect("localhost","root","","expensemanager");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

?>