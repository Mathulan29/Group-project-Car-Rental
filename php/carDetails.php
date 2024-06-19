<?php 

session_start();


if(!isset($_SESSION['username'])){
	header("location: userlogin.php");
}

require_once '../connect.php';


	$email = $_SESSION['username'];

    $sql_1="SELECT userID FROM user WHERE Email = '$email';";
    $result_1 = mysqli_query($connection, $sql_1);
    if ($result_1) {
        $row_1 = mysqli_fetch_assoc($result_1);
    }


require_once('userheader.php');

$carId = $_GET['carId'];
$start = $_GET['start'];
$end = $_GET['end'];
$TotalPrice = $_GET['TotalPrice'];
$PickUp = $_GET['PicUp'];
$DropOff = $_GET['DropOff'];

$sql = "SELECT cars.*, hub.name AS DriverName, hub.mobile AS DriverMobile
        FROM cars
        INNER JOIN hub ON cars.DriverId = hub.id
        WHERE cars.CarID = '$carId'";

$result = mysqli_query($connection, $sql);

if($result){
    $row = mysqli_fetch_assoc($result);
    if($row){
        $brand = $row['brand'];
        $Model = $row['Model'];
        $SC = $row['SeatingCapacity'];
        $TT = $row['TransmissionType'];  
        
        $imageDirectory = "../images/car/";
     
            $imageFormats = array("jpg", "jpeg", "png", "webp");
       
            $imagePath = null;
            foreach ($imageFormats as $format) {
                $fullImagePath = $imageDirectory . $carId . "." . $format;
                if (file_exists($fullImagePath)) {
                    $imagePath = $fullImagePath;
                    break;
                }
            }

            if ($imagePath) {
                $imageSource = $imagePath;
            } else {
                $imageSource = "../images/car/default.webp";
            }
    }
}

    
$startTime = strtotime($start);
$endTime = strtotime($end);

echo<<<HTML
        <div class="bigcard chngFont">
            <h1 style="color:var(--dark);">Confrime Your Booking</h1>
            <div class="carInfo">
                <div class="imagecontainer">
                    <img src="{$imageSource}" alt="Car Pic">
                    <p><i class='bx bx-info-circle'></i> We recommend that you make a call to the driver before confirming your booking. <br><br>
                    Please confirm if this price includes the fuel cost and if the driver has any bookings that were not made through this platform. And provide a detailed description of both the pickup and drop-off locations.</p>
                </div>
                <div class="data">
                    <h1 style="color:var(--dark)">{$row['brand']} {$row['Model']}</h1>
                    <table class='data-table'>
                        <tr>
                            <td>Type:</td>
                            <td>{$row['Type']}</td>
                        </tr>
                        <tr>
                            <td>Seating Capacity</td>
                            <td>{$row['SeatingCapacity']}</td>
                        </tr>
                        <tr>
                            <td>Transmission Type</td>
                            <td>{$row['TransmissionType']}</td>
                        </tr>
                        <tr>
                            <td>Pick Up Time</td>
                            <td>{$start}</td>
                        </tr>
                        <tr>
                            <td>Drop Off Time</td>
                            <td>{$end}</td>
                        </tr>
                        <tr>
                            <td>Pick Up Location</td>
                            <td>{$PickUp}</td>
                        </tr>
                        <tr>
                            <td>Drop Off Location</td>
                            <td>{$DropOff}</td>
                        </tr>
                        <tr>
                            <td>Hourly Rate</td>
                            <td>Rs.{$row['hourlyRate']}</td>
                        </tr>
                        <tr>
                            <td>Total Price</td>
                            <td>Rs.{$TotalPrice}.00</td>
                        </tr>
                        <tr>
                            <td>Driver Name:</td>
                            <td>{$row['DriverName']}</td>
                        </tr>
                        <tr>
                            <td>Driver Mobile Number:</td>
                            <td>{$row['DriverMobile']}</td>
                        </tr>
                    </table>    
                    </div>
            </div>

            <form action="">
                <h1>Payment Details</h1>
                <div class="inputbox">
                    <label for="">
                        <i class='bx bxs-credit-card creditCard'></i>
                    </label>
                    <input type="text" placeholder="Credit / Debit Card Number" required>
                </div>
                <div class="inputbox">
                    <label for="">
                        <i class='bx bxs-credit-card creditCard'></i>
                    </label>
                    <input type="text" placeholder="CVV" required>
                </div>
            </form>

            <a href="#" class="btn paybtn" id="Confrime" data-carID="{$carId}" data-start="{$start}" data-end="{$end}" data-userID="{$row_1['userID']}" data-cost="{$TotalPrice}" data-PicUp="{$PickUp}" data-DropOff="{$DropOff}">Pay Rs.{$TotalPrice}.00</a>
        </div>
HTML;

?>

<script>
    document.getElementById('Confrime').addEventListener('click', function () {
        const carId = this.getAttribute('data-carID');
        const start = this.getAttribute('data-start');
        const end = this.getAttribute('data-end');
        const userID = this.getAttribute('data-userID');
        const TotalPrice = this.getAttribute('data-cost');
        const PicUp = this.getAttribute('data-PicUp');
        const DropOff = this.getAttribute('data-DropOff');
        window.location.href = `insertBooking.php?carId=${carId}&start=${start}&end=${end}&userID=${userID}&Total=${TotalPrice}&PicUp=${PicUp}&DropOff=${DropOff}`;
    });
</script>

<?php

require_once('userfooter.php');

?>