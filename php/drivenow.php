<?php
    if(!isset($_GET['driver'])){
        header("Location: main (1).php");
        exit();
    }
    
$driver = $_GET['driver'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approving ride</title>

    <style>
        *{
            margin:0px;
        }
        .container
        {
            width:100%;
            background:white;
        }
        .header{
            width:100%;
            background:rgb(106, 188, 232);
        }
        #head
        {
            color:rgb(21, 7, 7);
            font-family:arial;
            font-size:36px;
            margin-left:41%;
           
        }
        #head2
        {
            color:white;
            font-family:arial;
            font-size:30px;
            float:right;
            margin-right:15px;
           
        }
        th
        {
            background:rgb(37, 37, 89);
            color:white;
        }
        td
        {
            text-align: center;
            background:white;
        }
        td p:hover
        {
            cursor: pointer;
        }
        #homepage
        {
            width:100px;
            padding:4px;
            color:black;
            background:none;
            border-radius:10px;
            float:right;
            margin-right:15px;
            margin-top:10px;

        }
        
        #submit
        {
            width:100px;
            padding:4px;
            color:black;
            background:rgb(68, 174, 223);
            border-radius:10px;
            margin-right:15px;
            margin-top:10px;
            
        }
        #echofare{
            background:white;
            width:100px;
            border:1px solid black;
            padding:5px;
        }
           
    </style>

</head>
<body>
    <div class="container">
        
        <div class="header">
            <input  id="homepage" type="button" value="Homepage" onclick="location.href = 'driverprofile.php?passid=<?php echo $driver ?>';">
            <br><br>
            
            <p id="head">BOOKING RIDE</p>
            <br><br><br>
            
        </div>
    <table style="width: 100%;">
        <tr>
         <th>Booking Id</th>
         <th>Vehicle Registration Number</th>
         <th>Pick Up Time</th>
         <th>Drop Off Time</th>
         <th>Pick Up Location</th>
         <th>Drop Off Location</th>
         <th>Total Price</th>
         <th>Customer Name</th>
         <th>Customer Mobile</th>
        </tr>

<?php

require_once('../connect.php');

    $sql = "SELECT bookings.*, user.Name AS UserName, user.tp AS UserTP
            FROM bookings
            INNER JOIN user ON bookings.userID = user.userID
            WHERE bookings.CarID IN (
            SELECT CarID
            FROM cars
            WHERE DriverID = '$driver'
            );";
            
    $result = mysqli_query($connection, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            $BID = $row['bookingID'];
            $carID = $row['CarID'];
            $start = $row['start'];
            $end = $row['end'];
            $PickUp = $row['PickUp'];
            $DropOff = $row['DropOff'];
            $TotalPrice = $row['TotalPrice'];
            $userName = $row['UserName'];
            $userTP = $row['UserTP'];

            echo<<<HTML
                <tr>
                    <td>{$BID}</td>
                    <td>{$carID}</td>
                    <td>{$start}</td>
                    <td>{$end}</td>
                    <td>{$PickUp}</td>
                    <td>{$DropOff}</td>
                    <td>Rs.{$TotalPrice}.00</td>
                    <td>{$userName}</td>
                    <td>{$userTP}</td>
                </tr>
HTML;

        }
    } else {
        echo "Error executing query: " . mysqli_error($connection);
    }
?>
        
     </table>
</body>

</html>