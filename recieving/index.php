<?php
// Check if the user is logged in, if not then redirect him to login page
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

 require_once "config.php";
//     $customer_result = mysql_query("SELECT * FROM orders");
//     $scustomers = mysql_query("SELECT cust_name, number, date, time, emp_name, colors, text, design, comments, paid FROM orders WHERE date = 2022-09-30;");
//     echo("$scustomers");
//             function delete($name) {
//             $sql = "DELETE FROM 'orders' where cust_name = $name;";
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #sidebar {
            position: fixed;
            width: 200px;
            height: 100%;
            background: rgb(255, 255, 255);
            left: 0px;
            transition: all 500ms linear;
        }

        body {
            margin: 0;
            padding: 0;
            background: rgb(255, 0, 0);
            color: black;
            font-family: sans-serif;
        }

        #middle {
            position: absolute;
            left: 200px;
            width: calc(100% - 200px);
            height: 100%;
            background: rgb(255, 255, 255);
            transition: all 500ms linear;
        }

        #right {
            position: absolute;
            left: 800px;
            width: calc(50% - 100px);
            height: 100%;
            background: rgb(255, 255, 255);
            transition: all 500ms linear;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="design.php">Design</a></li>
            <li><a href="ordering.php">Ordering</a></li>
            <li><a href="numbers.php">Employee Numbers</a></li>
            <li><a href="archive.php">Archive</a></li>
            <li><a href="support.php">Support</a></li>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </ul>
    </div>
    <div id="middle">
        <table id="table">
            <tr>
                <th onclick="sortTable(0)">Order Name</th>
                <th onclick="sortTable(1)">Order Date</th>
                <th onclick="sortTable(2)">Order Time</th>
            </tr>
        </table>
    </div>
    <div id="right">
        
        <button onclick="delete(#name.value)">Delete</button>
        <p>Name: </p>
        <p id="name"></p>
        <p>Phone Number: </p>
        <p id="phone"></p>
        <p>Time: </p>
        <p id="time"></p>
        <p>Size: </p>
        <p id="size"></p>
        <p>Colors: </p>
        <p id="colors"></p>
        <p>Message: </p>
        <p id="text"></p>
        <p>Comments: </p>
        <p id="comment"></p>
        <p>Employee: </p>
        <p id="employee"></p>
        <p>Paid: </p>
        <p id="paid"></p>
        <img src="" id="image">
    </div>
    
    <script type="text/javascript">
    
        // function addToTable(name, date, time) {
        //     var table = document.getElementById("table");
        //     var row = table.insertRow(1);
        //     var cell1 = row.insertCell(0);
        //     var cell2 = row.insertCell(1);
        //     var cell3 = row.insertCell(2);
        //     cell1.innerHTML = name;
        //     cell2.innerHTML = date;
        //     cell3.innerHTML = time;
        // }
        // function orderChange(name, number, time, size, colors, message, comments, employee, paid) {

        // }
        // function sortTable(n) {
        //     var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        //     table = document.getElementById("table");
        //     switching = true;
        //     // Set the sorting direction to ascending:
        //     dir = "asc";
        //     /* Make a loop that will continue until
        //     no switching has been done: */
        //     while (switching) {
        //         // Start by saying: no switching is done:
        //         switching = false;
        //         rows = table.rows;
        //         /* Loop through all table rows (except the
        //         first, which contains table headers): */
        //         for (i = 1; i < (rows.length - 1); i++) {
        //             // Start by saying there should be no switching:
        //             shouldSwitch = false;
        //             /* Get the two elements you want to compare,
        //             one from current row and one from the next: */
        //             x = rows[i].getElementsByTagName("TD")[n];
        //             y = rows[i + 1].getElementsByTagName("TD")[n];
        //             /* Check if the two rows should switch place,
        //             based on the direction, asc or desc: */
        //             if (dir == "asc") {
        //                 if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //                     // If so, mark as a switch and break the loop:
        //                     shouldSwitch = true;
        //                     break;
        //                 }
        //             } else if (dir == "desc") {
        //                 if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        //                     // If so, mark as a switch and break the loop:
        //                     shouldSwitch = true;
        //                     break;
        //                 }
        //             }
        //         }
        //         if (shouldSwitch) {
        //             /* If a switch has been marked, make the switch
        //             and mark that a switch has been done: */
        //             rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        //             switching = true;
        //             // Each time a switch is done, increase this count by 1:
        //             switchcount++;
        //         } else {
        //             /* If no switching has been done AND the direction is "asc",
        //             set the direction to "desc" and run the while loop again. */
        //             if (switchcount == 0 && dir == "asc") {
        //                 dir = "desc";
        //                 switching = true;
        //             }
        //         }
        //     }
        // }
    </script>
</body>

</html>