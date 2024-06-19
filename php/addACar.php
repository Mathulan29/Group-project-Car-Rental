<?php
    if(!isset($_GET['driver'])){
        header("Location: main (1).php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Madara CSS -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/styleH.css">
    <link rel="stylesheet" href="../css/mstyle.css">

    <title>userAcc_Details</title>
</head>

<body class="chngFont">
    <h1 style="text-align:center">Car Rental</h1><br>
    <div class="focus">
        <div class="wraper">
            <form action="" method="post">
                <h1>Register a New Car</h1>
                <div class="inputbox">
                    <label class="lab">Vehicle registration <br> Number</label>
                    <input type="text" name="VRN" placeholder="Ex: ABC-1234" required>
                </div>
                <div class="inputbox">
                    <label class="lab">Car Brand</label>
                    <input type="text" name="brand" placeholder="Ex: Honda" required>
                </div>
                <div class="inputbox">
                    <label class="lab">Car Model</label>
                    <input type="text" name="model" placeholder="Ex: Civic" required>
                </div>

                <div class="inputbox">
                    <label class="lab">Seating Capacity</label>
                    <input type="number" name="SeatCap" required>
                </div>

                <div class="inputbox">
                    <label class="lab">Type</label>
                    <select name="type" id="type">
                        <option value="Luxury">Luxury</option>
                        <option value="Semi Luxury">Semi Luxury</option>
                        <option value="Economy">Economy</option>
                    </select>
                </div>

                <div class="inputbox">
                    <label class="lab">Transmission Type</label>
                    <select name="transmission" id="transmission">
                        <option value="Auto">Auto</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
                
                <div class="inputbox">
                    <label class="lab">Hourly Rate</label>
                    <input type="number" name="HRate" placeholder="How much you willing to charge for an hour" required>
                </div>

                <input type="submit" class="btn" name="register" value="Register">
            </form>
        </div>
    </div>
</body>

</html>

<?php 
    require_once('../connect.php');

    $driver = $_GET['driver'];

    if (isset($_POST['register'])) {
        $VRN = strtoupper(mysqli_real_escape_string($connection, $_POST['VRN']));
        $brand = mysqli_real_escape_string($connection, $_POST['brand']);
        $model = mysqli_real_escape_string($connection, $_POST['model']);
        $SeatCap = mysqli_real_escape_string($connection, $_POST['SeatCap']);
        $type = mysqli_real_escape_string($connection, $_POST['type']);
        $transmission = mysqli_real_escape_string($connection, $_POST['transmission']);
        $HRate = mysqli_real_escape_string($connection, $_POST['HRate']);

        $sql_1 = "SELECT * FROM cars WHERE CarID = '$VRN';";
        $result_1 = mysqli_query($connection, $sql_1);

        if(mysqli_num_rows($result_1) > 0){
            echo("<script>alert('The vehicle is already registered')</script>");
            exit();
        }

        $sql = "INSERT INTO cars (CarID, DriverID, brand, Model, Type, SeatingCapacity, TransmissionType, hourlyRate) 
                VALUES ('$VRN', '$driver', '$brand', '$model', '$type', '$SeatCap', '$transmission', '$HRate');";
        $result = mysqli_query($connection, $sql);

        if($result){
            header("location: picUpload.php?VRN=$VRN&driver=$driver");
            exit();
        }else{
            $errorMessage = "Failed to register. Error: " . mysqli_error($connection);
            echo "<p style='color: red;'>$errorMessage</p>";
        }
    }
?>