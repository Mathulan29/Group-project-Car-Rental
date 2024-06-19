<?php 

//this code is for show and alert when redirected from insertbooking.php
session_start();

// Check if booking was successful and show alert
if(isset($_SESSION['bookingSuccess']) && $_SESSION['bookingSuccess'] === true) {
    echo "<script>alert('Booking Successful')</script>";
    // Unset session variable to prevent showing the alert again on refresh
    unset($_SESSION['bookingSuccess']);
}

if(!isset($_SESSION['username'])){
	header("location: userlogin.php");
}

require_once'userheader.php'; ?>

<form action="" class="carFilter chngFont" method="post">
    <div class="form-input">
        <label for="start" style="color:var(--dark)">Pick up time</label>
        <input type="datetime-local" id="start" name="start"
            value="<?php echo isset($_POST['start']) ? $_POST['start'] : ''; ?>" required>
    </div>

    <div class="form-input">
        <label for="End" style="color:var(--dark)">Drop off time</label>
        <input type="datetime-local" id="End" name="end"
            value="<?php echo isset($_POST['end']) ? $_POST['end'] : ''; ?>" required>
    </div>

    <br>

    <div class="form-input">
        <label for="PL" style="color:var(--dark)">Pick up location</label>
        <input type="text" id="PL" name="PL" value="<?php echo isset($_POST['PL']) ? $_POST['PL'] : ''; ?>" required>
    </div>

    <div class="form-input">
        <label for="DL" style="color:var(--dark)">Drop off Location</label>
        <input type="text" id="DL" name="DL" value="<?php echo isset($_POST['DL']) ? $_POST['DL'] : ''; echo isset($_GET['DropOff']) ? $_GET['DropOff'] : ''; ?>" required>
    </div>

    <div class="form-input">
        <label for="type" style="color:var(--dark)">Type</label>
        <select name="type" id="type">
        <option value="Luxury" <?php echo ((isset($_POST['type']) && $_POST['type'] == 'Luxury') || (isset($_GET['type']) && $_GET['type'] == 'Luxury')) ? 'selected' : ''; ?>>Luxury</option>
        <option value="Semi Luxury" <?php echo ((isset($_POST['type']) && $_POST['type'] == 'Semi Luxury') || (isset($_GET['type']) && $_GET['type'] == 'Semi Luxury')) ? 'selected' : ''; ?>>Semi Luxury</option>
        <option value="Economy" <?php echo ((isset($_POST['type']) && $_POST['type'] == 'Economy') || (isset($_GET['type']) && $_GET['type'] == 'Economy')) ? 'selected' : ''; ?>>Economy</option>
        </select>
    </div>

    <div class="form-input" style="margin: auto;">
        <button type="submit" class="search-btn" name="filter"><i class='bx bx-search'></i></button>
    </div>
</form>

<script>
    var now = new Date();

    var currentDateTime = now.toISOString().slice(0, 16);

    document.getElementById("start").min = currentDateTime;
    document.getElementById("End").min = currentDateTime;
</script>

<div class="cardContainer">

    <?php
    require_once('../connect.php');

    if (isset($_POST['filter'])) {

    $start = $_POST['start'] . ":00";
    $end = $_POST['end'] . ":00";
    $PickUp = $_POST['PL'];
    $DropOff = $_POST['DL'];
    $type = $_POST['type'];

    // Convert start and end times to DateTime objects

    $startTime = strtotime($start);
    $endTime = strtotime($end);

    if($startTime>=$endTime){
        die("<script>alert('Add a valid time period')</script>");
    }

    $query =   "SELECT c.*
                FROM cars c
                WHERE type = '$type' 
                AND c.CarID 
                NOT IN (
                    SELECT DISTINCT b.CarID
                    FROM bookings b
                    WHERE b.start <= '$end' 
                    AND b.end >= '$start'
                    )";

    $result = mysqli_query($connection, $query);

    if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {

            // Path to the directory containing car images
            $imageDirectory = "../images/car/";
            
            // Array of image formats to check
            $imageFormats = array("jpg", "jpeg", "png", "webp");
            
            // Loop through each image format and check if the image file exists
            $imagePath = null;
            foreach ($imageFormats as $format) {
                $fullImagePath = $imageDirectory . $row['CarID'] . "." . $format;
                if (file_exists($fullImagePath)) {
                    $imagePath = $fullImagePath;
                    break; // Stop loop if image is found
                }
            }
            
            // If image path is found, use it, otherwise use a default image
            if ($imagePath) {
                $imageSource = $imagePath;
            } else {
                $imageSource = "../images/car/default.webp";
            }

            $duration = abs($startTime - $endTime)/3600;; // Difference in hours


            // Calculate total price
            $totalPrice = $row['hourlyRate'] * $duration;
            $totalPrice = ceil($totalPrice); 
            
            echo <<<HTML
                <div class='card'>
                    <img src="{$imageSource}" alt="Avatar">
                    <div class="container">
                    <h3>{$row['brand']} {$row['Model']}</h3>
                        <table class="data-table mini-table">
                        <tr>
                            <td>Type:</td>
                            <td>{$row['Type']}</td>
                        </tr>
                        <tr>
                            <td>Seating Capacity:</td>
                            <td>{$row['SeatingCapacity']}</td>
                        </tr>
                        <tr>
                            <td>Transmission Type:</td>
                            <td>{$row['TransmissionType']}</td>
                        </tr>
                        <tr>
                            <td>Hourly Rate:</td>
                            <td>Rs.{$row['hourlyRate']}.00</td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td>Rs.{$totalPrice}.00</td>
                        </tr>
                        <a href="#" class="btn cardBottomBtn" carid="{$row['CarID']}" data-start="{$start}" data-end="{$end}" data-TotalPrice="{$totalPrice}" data-PicUp="{$PickUp}" data-DropOff="{$DropOff}">Rent This Car</a>
                        </table>
                    </div>
                </div>
HTML;
        }
    } else {
        echo "Error executing query: " . mysqli_error($connection);
    }

    // Close database connection
    mysqli_close($connection);
}
?>

    <script>
        document.getElementById('rent').classList.add('active');

        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function () {
                const carId = this.getAttribute('carid');
                const start = this.getAttribute('data-start');
                const end = this.getAttribute('data-end');
                const TotalPrice = this.getAttribute('data-TotalPrice');
                const PicUp = this.getAttribute('data-PicUp');
                const DropOff = this.getAttribute('data-DropOff');
                window.location.href =
                    `carDetails.php?carId=${carId}&start=${start}&end=${end}&TotalPrice=${TotalPrice}&PicUp=${PicUp}&DropOff=${DropOff}`;
            });
        });
    </script>

    </section>
    </body>

    </html>