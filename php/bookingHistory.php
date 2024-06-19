<?php

require_once('../connect.php');

session_start();

require_once('userheader.php');
?>
<div class="data chngFont">
    <h2 style="color:var(--dark)">Booking History</h2><br>
<table class="data-table">
    <tr>
        <th>Booking <br> ID</th>
        <th>Car ID</th>
        <th>Car</th>
        <th>Duration</th>
        <th>journey</th>
        <th>Driver <br>Name</th>
        <th>Driver <br>Mobile</th>
        <th>Total Price</th>
    </tr>

<?php

if(!isset($_SESSION['username'])){
	header("location: login.php");
}

$email = $_SESSION['username'];

$sql_1 = "SELECT userID FROM user WHERE Email = '$email';";
$result_1 = mysqli_query($connection, $sql_1);

if($result_1){
    $row_1 = mysqli_fetch_assoc($result_1);
    $userID = $row_1['userID'];
    $sql = "SELECT bookings.*, hub.Name AS DriverName, hub.Mobile AS DriverMobile
            FROM bookings
            INNER JOIN cars ON bookings.carID = cars.carID
            INNER JOIN hub ON cars.DriverID = hub.id
            WHERE bookings.userID = '$userID';";
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
            $DName = $row['DriverName'];
            $DMobile = $row['DriverMobile'];

            $sql_2 = "SELECT * FROM cars WHERE carID = '$carID';";
            $result_2 = mysqli_query($connection, $sql_2);
            $row_2 = mysqli_fetch_assoc($result_2);

            $brand = $row_2['brand'];
            $model = $row_2['Model'];

            echo<<<HTML
                <tr>
                    <td>{$BID}</td>
                    <td>{$carID}</td>
                    <td>{$brand} <br>{$model}</td>
                    <td>From : {$start} <br>To : {$end}</td>
                    <td>From : {$PickUp} <br>To : {$DropOff}</td>
                    <td>{$DName}</td>
                    <td>{$DMobile}</td>
                    <td>Rs.{$TotalPrice}.00</td>
                </tr>
HTML;

        }
    } else {
        echo "Error executing query: " . mysqli_error($connection);
    }
?>
</table>
</div>

<script>
        document.getElementById('bookingHistory').classList.add('active');
</script>

<?php

require_once('userfooter.php');
}