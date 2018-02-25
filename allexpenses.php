<?php
session_start();
if (!isset($_SESSION["u_id"])) {
    header("location: ./");
}
if (isset($_POST['submit'])) {
    $selected_category = $_POST['c_id'];

    if ($selected_category === "all") {
        unset($selected_category);
    }
}
require_once './connection.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="expenense.css">
        <meta charset="UTF-8">
        <title></title>
        <style>
            form{
                margin: auto;
                width: 50%;
                padding: 20px 30px 30px 30px; 
                background-color: whitesmoke; 
                box-shadow: 0 2px 4px 3px #999; 
                border-radius: 60px;
            }button {
                position: absolute;

                background-color: #f1f1f1;
                color: black;
                font-size: 16px;
                padding: auto;
                border:2px solid black;
                cursor: pointer;
                border-radius: 5px;
                text-align: center;
            }
            button:hover {
                background-color: black;
                color: white;
            }
            table {
                margin: auto;
                font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
                font-size: 12px;
                alignment-adjust: central;
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
                <a href="home.php">Back </a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <div id="content6" style="width:60% ; margin: 60px auto;" >
            <form  method="post">
                <?php
                require_once './connection.php';
                echo "<select name='c_id' style='width: 100%'>";
                echo '<option value="all">' . 'Show All' . '</option>';
                $query = mysqli_query($conn, "SELECT * FROM category");
                while ($row = mysqli_fetch_array($query)) {
                    echo "<option value='" . $row['c_id'] . "'>" . $row['categorytype']
                    . '</option>';
                }
                echo '</select>';
                ?>
                <br>
                <br>
                <button name="submit" type="submit">Submit</button>
                <br>
            </form>
            <table class="data-table">
                <caption class="title"><h1> All Transaction </h1></caption>
                <thead> 
                    <tr>
                        <th>Sr.no</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $uid = $_SESSION["u_id"];
                    $query = "SELECT categorytype, amount, entry_date FROM `money` INNER JOIN category ON money.c_id= category.c_id WHERE money.u_id = $uid";
                    if (isset($selected_category)) {
                        $query = " SELECT categorytype, amount, entry_date FROM `money` INNER JOIN category ON money.c_id= category.c_id WHERE money.u_id = $uid AND money.c_id = $selected_category";
                    }
                    $result = mysqli_query($conn, $query);
                    $total = 0;
                    $no = 0;
                    $tot = "total";
                    while ($row = mysqli_fetch_array($result)) {
                        $no +=1;
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['categorytype'] . "</td>";
                        echo "<td>" . $row['amount'] . "</td>";
                        echo "<td>" . $row['entry_date'] . "</td>";
                        echo "</tr>";
                        $total += $row['amount'];
                    }
                    if ($total > 0) {
                        echo "<tr>";
                        echo "<td>";
                        echo "</td>";
                        echo "<td>";
                        echo "</td>";
                        echo "<td>" . $tot . "</td>";
                        echo "<td>" . $total . "</td>";
                        echo "</tr>";
                        echo "</table>";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
