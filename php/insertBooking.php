<?php

$carId = $_GET['carId'];
$start = $_GET['start'];
$end = $_GET['end'];
$userID = $_GET['userID'];
$TotalPrice = $_GET['Total'];
$PickUp = $_GET['PicUp'];
$DropOff = $_GET['DropOff'];

require_once('../connect.php');

session_start();

$sql="INSERT INTO bookings(CarID, start, end, PickUp, DropOff, TotalPrice, userID) VALUES ('$carId','$start','$end', '$PickUp', '$DropOff', '$TotalPrice','$userID')";
$result = mysqli_query($connection, $sql);

if($result){
    $_SESSION['bookingSuccess'] = true;
    header("location: rent.php");
}else{
    $errorMessage = "Failed to book. Error: " . mysqli_error($connection);
    echo "<p style='color: red;'>$errorMessage</p>";
}

?>