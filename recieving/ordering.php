<!DOCTYPE html>
<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
        global $name, $phone, $size, $date, $time, $employee, $color, $text, $image, $design, $comment, $paid;
        $name = ($_POST['name']);
        $phone = ($_POST['phone']);
        $size = ($_POST['size']);
        $date = ($_POST['date']);
        $time = ($_POST['time']);
        $employee = ($_SESSION["username"]);
        $color = ($_POST['color']);
        $text = ($_POST['text']);
        $image = ($_POST['image']);
        $design = ($_POST['design']);
        $comment = ($_POST['comment']);
        $paid = ($_POST['paid']);
        
        $sql = "INSERT INTO `orders` (`cust_name`, `number`, `size`, `date`, `time`, `emp_name`, `colors`, `text`, `image`, `design`, `comments`, `paid`) VALUES ('$name', '$phone', '$size', '$date', '$time', '$employee', '$color', '$text', '$image', '$design', '$comment', '$paid');
        INSERT INTO `archive` (`cust_name`, `number`, `size`, `date`, `time`, `emp_name`, `colors`, `text`, `image`, `design`, `comments`, `paid`) VALUES ('$name', '$phone', '$size', '$date', '$time', '$employee', '$color', '$text', '$image', '$design', '$comment', '$paid');";
        if ($conn->multi_query($sql) === TRUE) {
            echo "New records created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $conn->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" enctype=multipart/form-data action="ordering.php">
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="number">Phone Number</label>
        <input type="number" min="1" max="9999999999" name="phone">
        <label for="size">Size</label>
        <input type="text" name="size">
        <label for="date">Date</label>
        <input type="date" name="date">
        <label for="time">Time</label>
        <input type="text" name="time">
        <label for="color">Colors</label>
        <input type="text" name="color">
        <label for="text">Writing (This is only for what is written on the cake)</label>
        <input type="text" name="text">
        <label for="image">Image (If you have one)</label>
        <input type="file" name="image">
        <label for="design">Design Code (If you have one)</label>
        <input type="text" name="design">
        <label for="comments">Comments (anything extra)</label>
        <input type="text" name="comment">
        <label for="paid">Paid?</label>
        Yes<input type="radio" name="paid" value=1>
        No<input type="radio" name="paid" value=0>
        <input type="submit">
        </form>
</body>
</html>