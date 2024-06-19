<?php

session_start();

if(!isset($_SESSION['username'])){
	header("location: login.php");
}

require_once '../connect.php';

if (isset($_POST['update'])) {
	// Retrieve updated data from the form
	$name = $_POST['name'];
	$email = $user['email'];
	$telephone = $_POST['TP'];
	$address = $_POST['address'];
	
	// Update the database row
	$sql = "UPDATE user SET  Name = ?, tp = ?, Address = ? WHERE Email = ?";
	$stmt = mysqli_prepare($connection, $sql);
	mysqli_stmt_bind_param($stmt, "ssss", $name, $telephone, $address, $_SESSION['username']);
	mysqli_stmt_execute($stmt);

	// Redirect back to the account details page
	header("Location: userDetails.php");
	exit();
}


require_once 'userheader.php';

$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE Email = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>

		<!-- MAIN -->
		<main class="focus">
			<div class="wraper">
                <form action="" method="post">
                    <h1>Account Details</h1>
                    <div class="inputbox">
                        <label class="lab">Name</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($user['Name']); ?>" readonly required>
                    </div>
                    <div class="inputbox">
                        <label class="lab">E Mail</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" readonly>
                    </div>
                    <div class="inputbox">
                        <label class="lab">Telephone</label>
                        <input type="tel" name="TP" value="<?php echo htmlspecialchars($user['tp']); ?>" readonly required>
                    </div>
                    <div class="inputbox">
                        <label class="lab">Address</label>
                        <input type="text" name="address" value="<?php echo htmlspecialchars($user['Address']); ?>" readonly required>
                    </div>
                    <label for="enableEdit" class="switch-mode">Enable Editing:</label>
                    <input type="checkbox" id="enableEdit"><br><br>
				<input type="submit" class="btn" name="update" value="Update Details" id="updateBtn" style="display:none">
                </form>
                
            </div>
		</main>
		<!-- MAIN -->
	
	<script>

        document.getElementById('details').classList.add('active');

		var enableEditCheckbox = document.getElementById('enableEdit');

		var inputFields = document.querySelectorAll('input[type="text"], input[type="tel"]');

		enableEditCheckbox.addEventListener('change', function () {
			if (this.checked) {
				inputFields.forEach(function (field) {
					field.removeAttribute('readonly');
				});
				document.getElementById('updateBtn').style.display = 'block';
			} else {
				inputFields.forEach(function (field) {
					field.setAttribute('readonly', '');
				});
				document.getElementById('updateBtn').style.display = 'none';
			}
		});
	</script>

<?php 
	require_once('userfooter.php');
?>