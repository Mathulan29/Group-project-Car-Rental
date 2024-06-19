<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver login and registration</title>
    <link rel="stylesheet" href="../css/driverstyle.css">
</head>




<body>
    <div class="container">
        <div class="formbox">
            <p id="welcome">Welcome Driver</p>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            
            
            
            <form id="login" method="POST" class="input-group">
                 <input type="text" name="id1" class="input-field" placeholder="Driver NIC" required><br><br>
                <input type="password" name="pas1" class="input-field" placeholder="Enter Password" required><br><br><br><br>
                    <button type="submit" name="log" class="submit-btn">Login</button><br><br>
                 <input type="button" class="submit-btn" value="Forgot Password">
                </form>


            
            
            <form id="register" method="POST" class="input-group" >
                <input type="text" name="cabid" class="input-field" placeholder="Driver NIC" required>
                <input type="text" name="name" class="input-field" placeholder="Name" required> 
                <input type="text" name="mobile" class="input-field" placeholder="Mobile Number" required> 
                <input type="date" name="dob" class="input-field" placeholder="Date Of Birth" required> <br><br>

                <input type="radio" id="male" name="gender" value="M">
                <label  id="gender" for="male">Male</label>
                <input type="radio" id="female" name="gender" value="F">
                <label id="gender"  for="female"> Female</label> <br><br>

                <input type="password" name="password" class="input-field" placeholder="Create Password" required> 

                <input type="checkbox" class="check-box"><span>I agree to the terms conditions</span>
                <button type="submit" name="register" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");
        function register()
        {
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login()
        {
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0";
        }
</script>



</body>
</html>


<?php  //connection part

$connection=mysqli_connect('localhost','root','','rental2');

if(mysqli_connect_errno())
{
    die('Database connection failed'.mysqli_connect_errno());
}
else
{
    //echo "Connection successful.";
}
?>


<?php  //adding new members

if(isset($_POST['register'])){


$sql=" INSERT INTO hub VALUES
(
'".$_POST['cabid']."',
'".$_POST['name']."',
'".$_POST['mobile']."',
'".$_POST['dob']."',
'".$_POST['gender']."',
'".$_POST['password']."'
) ";

$result=mysqli_query($connection,$sql);

if($result)
echo"<script> alert ('Registered') </script>";
else
echo"failed";
}


?>

<?php //login

if(isset($_POST['log'])){

    $cab = mysqli_real_escape_string($connection, $_POST['id1']);
    $pas = mysqli_real_escape_string($connection, $_POST['pas1']);

$sql2 = "SELECT * FROM hub WHERE id='$cab' AND pass='$pas'";

$result2=mysqli_query($connection,$sql2);
$count=mysqli_num_rows($result2);

if ($count > 0) {
    header("Location: driverprofile.php?passid=$cab");
} else {
    echo "<script> alert ('not found') </script>";
}

}
?>