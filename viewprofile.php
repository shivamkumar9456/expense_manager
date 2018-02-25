<?php
session_start();
if (!isset($_SESSION["u_id"])) {
    header("location: ./");
}
require_once './connection.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="expenense.css">
        <meta charset="UTF-8">
        <title></title>
        <style>
          table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}
                table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}

        </style>
    </head>
    <body>
        <div id="header">
            <h1>Expense Manager</h1>
            <div class="group">

                <a href="profile.php">Back </a>
                <a href="logout.php">logout</a>
            </div>
        </div>
         <div id="content" style="width:60% ; margin: 60px auto;" >
  
	<table class="data-table">
		<caption class="title">User Information</caption>
		<thead>
			<tr>
				<th>User id</th>
				<th>User name</th>
				<th>Password</th>
				<th>Name</th>
				<th>Email</th>
                                <th>Contact</th>
			</tr>
		</thead>
		<tbody>
            <?php
            $uid = $_SESSION["u_id"];
            $result = mysqli_query($conn, "SELECT * FROM user where u_id = $uid");
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['u_id'] . "</td>";
                echo "<td>" . $row['user_name'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($conn);
            ?>
    </body>
</html>
