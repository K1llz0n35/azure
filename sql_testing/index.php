<!DOCTYPE html>
<?php
    $servername = "localhost";
    $username = "ghernand_order";
    $password = "Deadmentellnotales";
    $dbname = "ghernand_orders";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
$customer_result = mysql_query("SELECT * FROM 'orders'");
while($customer_row = mysql_fetch_array($customer_result)) { echo "<p>".$customer_row['date']."</p>"; }
?>