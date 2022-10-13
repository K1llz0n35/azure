<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// require_once "config.php";
//     $customer_result = mysql_query("SELECT * FROM orders");
//     $scustomers = mysql_query("SELECT cust_name, number, date, time, emp_name, colors, text, design, comments, paid FROM orders WHERE date = 2022-09-30;");
//     echo("$scustomers");
//             function delete($name) {
//             $sql = "DELETE FROM 'orders' where cust_name = $name;";
//             ?>
    
<!DOCTYPE html>
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
            <li><a href="https://www.ghernandez.org/ordering">Ordering</a></li>
            <li><a href="numbers.php">Employee Numbers</a></li>
            <li><a href="archive.php">Archive</a></li>
            <li><a href="support.php">Support</a></li>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </ul>
    </div>
    <div id="middle">
        <h1>Support</h1>
        <p>For immediate help or to report a bug, please contact the Gavin at <a href="tel:2257154057>2257154057</a></p>

</html>