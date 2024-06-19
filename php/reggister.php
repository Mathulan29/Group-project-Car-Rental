<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Madara CSS -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/styleH.css">

    <title>userAcc_Details</title>
</head>

<body class="chngFont">
    <h1 style="text-align:center">Car Rental</h1><br>
    <div class="focus">
        <div class="wraper">
            <form action="" method="post">
                <h1>Register as a<br>New User</h1>
                <div class="inputbox">
                    <label class="lab">Name</label>
                    <input type="text" name="name" value="<?php echo isset($_POST['register']) ? $_POST['name'] : ''; ?>" required>
                </div>
                <div class="inputbox">
                    <label class="lab">E Mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="inputbox">
                    <label class="lab">Telephone</label>
                    <input type="tel" name="TP" value="<?php echo isset($_POST['register']) ? $_POST['TP'] : ''; ?>" required>
                </div>
                <div class="inputbox">
                    <label class="lab">Address</label>
                    <input type="text" name="address" value="<?php echo isset($_POST['register']) ? $_POST['address'] : ''; ?>" required>
                </div>

                <!-- values are added to the input field,
                so if a user used an existing E mail and
                return to this page again, user does not
                have to fill the form again -->

                <div class="inputbox">
                    <label class="lab">Password</label>
                    <input type="password" name="pwd" required>
                </div>
                <div class="inputbox">
                    <label class="lab">Re-Enter Password</label>
                    <input type="password" name="repwd" required>
                </div>
                <input type="submit" class="btn" name="register" value="Register">
            </form>
            <p>Already have an account <a class="logOrReg" href="./userlogin.php">Log In</a></p>
        </div>
    </div>
</body>

</html>

<?php 
    require_once('../connect.php');

    if (isset($_POST['register'])) {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $tp = mysqli_real_escape_string($connection, $_POST['TP']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $pwd = mysqli_real_escape_string($connection, $_POST['pwd']);
        $repwd = mysqli_real_escape_string($connection, $_POST['repwd']);

        $sql_1 = "SELECT * FROM user WHERE Email = '$email';";
        $result_1 = mysqli_query($connection, $sql_1);

        if(mysqli_num_rows($result_1) > 0){
            echo("<script>alert('Email already has taken')</script>");
            exit();
        }

        if($pwd != $repwd){
            echo("<script>alert('Pasword does not match')</script>");
            exit();
        }
        
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (Name, pwd, Email, tp, Address) VALUES ('$name', '$hashed_pwd', '$email', '$tp', '$address');";
        $result = mysqli_query($connection, $sql);

        if($result){
            echo "<script>alert('Registration Successfull')</script>";
            session_start();
            $_SESSION['username'] = $email;
            header("location: rent.php");
            exit();
        }else{
            $errorMessage = "Failed to register. Error: " . mysqli_error($connection);
            echo "<p style='color: red;'>$errorMessage</p>";
        }
    }
?>
 <?php include 'footer.php'; ?>