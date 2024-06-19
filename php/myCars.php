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
    <title>My cars</title>

    
    <link rel="stylesheet" href="../css/userstyle.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/styleH.css">
    <link rel="stylesheet" href="../css/mstyle.css">

    <style>
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
    </style>

</head>

<body>

<div class="header">
            <input  id="homepage" type="button" value="Homepage" onclick="location.href = 'driverprofile.php?passid=<?php echo $driver ?>';">
            <br><br>
            
            <p id="head">Your Cars</p>
            <br><br><br>
            
        </div>

    <div class="cardContainer">

<?php
require_once('../connect.php');

$driver = $_GET['driver'];

$query =   "SELECT *
            FROM cars
            WHERE DriverID = '$driver';";

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

        echo <<<HTML
            <div class='card'>
                <img src="{$imageSource}" alt="Car Image">
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
                    </table>
                    <a href="#" class="btn cardBottomBtn" carid="{$row['CarID']}">Delete</a>
                </div>
            </div>
HTML;
    }}

// Close database connection
mysqli_close($connection);

?>

<a href="addACar.php?driver=<?php echo $driver; ?>">
<div class="card addNewCard">
    <img src="../images/Icons/plus.png" alt="">
    <h1 style="color:#44b3e4;">Add a new Car</h1>
</div>
</a>

<script>
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('Are you sure you want to delete this item');
                const carId = this.getAttribute('carid');
                window.location.href = `deleteCar.php?carId=${carId}&driver=<?php echo $driver ?>`;
            });
        });
</script>

</body>

</html>