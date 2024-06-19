<?php

require_once('../connect.php');

$un = $_SESSION['username'];
$sql = "SELECT Name FROM user WHERE Email='$un';";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- Madara CSS -->
	<link rel="stylesheet" href="../css/userstyle.css">
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/styleH.css">

	<title>User</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text"><?php echo $row['Name'] ?></span>
		</a>
		<ul class="side-menu top">
			<li id="rent">
				<a href="rent.php" class="sidebtn">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Rent A Car</span>
				</a>
			</li>
			<li id="details">
				<a href="userDetails.php" class="sidebtn">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">My Account</span>
				</a>
			</li>
			<li id="bookingHistory">
				<a href="bookingHistory.php" class="sidebtn">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Booking History</span>
				</a>
			</li>

			<li id="bookingHistory">
				<a href="packages.php" class="sidebtn">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">View Packages</span>
				</a>
			</li>

		</ul>
		<ul class="side-menu">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		