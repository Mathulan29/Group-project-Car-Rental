<?php

@include '../connect.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];
  

   if(empty($product_brand) || empty($product_price) ){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE cars SET brand='$product_brand', hourlyRate='$product_price'  WHERE CarID = '$id'";
      $upload = mysqli_query($connection, $update_data);


   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($connection, "SELECT * FROM cars WHERE CarID = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_brand" value="<?php echo $row['brand']; ?>" placeholder="enter the vehicle brand">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['hourlyRate']; ?>" placeholder="enter the product price">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="adminAddVehicle.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>