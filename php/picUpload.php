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
    <!-- Himantha CSS -->
    <link rel="stylesheet" href="../css/styleH.css">
    <link rel="stylesheet" href="../css/mstyle.css">

    <title>userAcc_Details</title>
</head>

<body class="chngFont">
    <h1 style="text-align:center">Car Rental</h1><br>
    <div class="focus">
        <div class="wraper">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Upload an Image Of Your Car</h1>
                <div class="inputbox">
                    <label for="image">Select image to upload:</label>
                    <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/png, image/webp">
                </div>

                <input type="submit" class="btn" name="submit" value="Upload">
            </form>
        </div>
    </div>
</body>

</html>

<?php

$driver = $_GET['driver'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $newName = $_GET["VRN"];
        $fileTmp = $_FILES["image"]["tmp_name"];
        $fileType = $_FILES["image"]["type"];

        $uploadDir = "../images/car/";

        $uploadFile = $uploadDir . uniqid() . "_" . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($fileTmp, $uploadFile)) {
            
            if (!empty($newName)) {
                $fileInfo = pathinfo($uploadFile);
                $newFileName = $uploadDir . $newName . "." . $fileInfo["extension"];
                rename($uploadFile, $newFileName);
                header("location: myCars.php?driver=$driver");
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
