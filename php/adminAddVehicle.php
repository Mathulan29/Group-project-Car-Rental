<?php

@include '../connect.php';

if(isset($_POST['add_product'])){
   $product_brand = $_POST['product_brand'];
   $product_model = $_POST['product_model'];
   $product_number = $_POST['product_number'];
   $product_capacity = $_POST['product_capacity'];
   $product_type = $_POST['product_type'];
   $product_transmission = $_POST['product_transmission'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_extension = pathinfo($product_image, PATHINFO_EXTENSION); // Get the file extension
   $new_image_name = $product_number . '.' . $product_image_extension; // New file name
   
   $product_image_folder = '../images/car/'.$new_image_name; // Destination folder with the new file name


      $insert = "INSERT INTO cars (CarID, DriverID, brand, Model, Type, SeatingCapacity, TransmissionType, hourlyRate) 
      VALUES ('$product_number', 'ADMIN', '$product_brand', '$product_model', '$product_type', '$product_capacity', '$product_transmission', '$product_price');";
      $upload = mysqli_query($connection,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      
   }
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($connection, "DELETE FROM cars WHERE CarID = '$id'");
   header('location:adminhome.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>


<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Add a new Vehicle</h3>
         <input type="text" placeholder="Enter Vehicle Brand" name="product_brand" class="box" required>
         <input type="text" placeholder="Enter Vehicle Model" name="product_model" class="box" required>
         <input type="text" placeholder="Enter Vehicle number" name="product_number" class="box"  required>
         <input type="number" placeholder="Seating Capacity" name="product_capacity" class="box" required>
        
                    <select class="box" name="product_type" id="type">
                        <option value="Luxury">Luxury</option>
                        <option value="Semi Luxury">Semi Luxury</option>
                        <option value="Economy">Economy</option>
                    </select>

                    <select class="box" name="product_transmission" id="transmission">
                        <option value="Auto">Auto</option>
                        <option value="Manual">Manual</option>
                    </select>

         <input type="number" placeholder="Enter rental price per hour" name="product_price" class="box"  required>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php

   $select = mysqli_query($connection, "SELECT * FROM cars");

          
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Vehicle image</th>
            <th>Vehicle name</th>
            <th>Vehicle number</th>
            <th>Rent price per hour</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ 
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
?>
         <tr>
            <td><img src="<?php echo $imageSource; ?>" height="100" alt=""></td>
            <td><?php echo $row['brand']; echo " ";echo $row['Model'] ?></td>
            <td><?php echo $row['CarID']; ?></td>
            <td>Rs. <?php echo $row['hourlyRate']; ?>/-</td>
            <td>
               <a href="adminUpdateVehicle.php?edit=<?php echo $row['CarID']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="adminAddVehicle.php?delete=<?php echo $row['CarID']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>
