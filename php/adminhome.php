<?php 
   session_start();

   include("../connect.php");
   if(!isset($_SESSION['valid'])){
    header("Location: php/adminindex.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="php/adminhome.php">car<span style="color:red">Rentals</span></a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($connection,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            
            echo "<a href='adminedit.php?Id=$res_id'>Change Profile</a>";
            ?>
            <a href="adminAddVehicle.php"> <button class="btn">Add Vehicle</button> </a>
            <a href="viewbookings.php"> <button class="btn">View Bookings</button> </a>
            <a href="viewuserdetails.php"> <button class="btn">View User Details</button> </a>
            <a href="viewdriverdetails.php"> <button class="btn">View Driver Details</button> </a>
            <a href="logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>Age <b><?php echo $res_Age ?></b>.</p> 
            </div>
          </div>
       </div>

    </main>
</body>

</html>