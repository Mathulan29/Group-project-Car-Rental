<?php
    if(!isset($_GET['driver'])){
        header("Location: main (1).php");
        exit();
    }

$driver= $_GET['driver'];
require_once('../connect.php');

$carID = $_GET['carId'];

$sql = "DELETE FROM cars WHERE CarID = '$carID'";
$result = mysqli_query($connection, $sql);
header("location: myCars.php?driver=$driver");

?>