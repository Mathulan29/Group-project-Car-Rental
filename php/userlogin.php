<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Madara CSS -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <!-- Himantha CSS -->
    <link rel="stylesheet" href="../css/styleH.css">

    <title>Login</title>
</head>

<body class="chngFont">
    <h1 style="text-align:center">Car Rental</h1><br>
    <div class="focus">
        <div class="wraper">
            <form action="userlogin.php" method="post">
                <h1>LOGIN</h1>
                <div class="inputbox">
                    <input type="text" placeholder="Username (Your Email)" name="uName" required>
                </div>
                <div class="inputbox">
                    <input type="password" placeholder="Password" name="pwd" required>
                </div>
                <input type="submit" class="btn" name="login" value="Login">
                <p>Don't have an account <a class="logOrReg" href="./reggister.php">Register now</a></p>
            </form>
            Are you admin? <a href="adminindex.php">Login Now</a><br>
                    Are you a driver? <a href="main (1).php">Login Now</a>
        </div>
    </div>
</body>

</html>
<?php
    require_once('../connect.php');

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($connection, $_POST['uName']);
        $password = mysqli_real_escape_string($connection, $_POST['pwd']);

        $sql = "SELECT pwd FROM user WHERE Email = '$username'";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $stored_password = $row['pwd'];
                if (password_verify($password, $stored_password)) {
                    session_start();
                    $_SESSION['username'] = $username;
                    header("location: rent.php");
                    exit();
                } else {
                    echo "<script>alert('Username or password is invalid')</script>";
                }
            } else {
                echo "<script>alert('Username not found')</script>";
            }
        } else {
            echo "<script>alert('Database error')</script>";
        }
    }
?>
 <?php include 'footer.php'; ?>
