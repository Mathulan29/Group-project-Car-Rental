<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver profile</title>
    <style>
    *{
        margin:0;
    }
.container{
            width:100%;
            background:rgb(28, 75, 136);
            color:black;
            height:100vh;
        }  
       
.list ul{
	float:right;
	list-style-type:none;
	margin-top:25px;
	
}
ul li{	
	display:inline-block;
	
}
ul li a{
	text-decoration:none;
	color:rgb(255, 255, 255);
	padding:5px 20px;
	border:1px solid transparent;
	transition:0.6s ease;
	font-weight: 20px;
}
ul li a:hover
{
	background-color:#fff;
	color:#000;
	box-shadow:0px 0px 0px 0px grey;
	
}

ul li.active a
{
	background-color:white;
	color:black;
	
}

.content{
            width:50%;
            margin-right:10px;
            float:right;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size:large;
            background:#ffffff;
            padding:2%;
            height:350px;
           
        }
        
        
        #header{
            background:rgb(85, 192, 216);
            text-align:center;
            font-size:26px;

        }
        

        

.outline {
  display: contents;
  border: 1px solid red;
  background-color: lightgrey;
  padding: 10px;
  width: 200px;
  
}
    
.data {
  border: 1px solid blue;
  background-color: lightblue;
  padding: 10px;
  border-radius:10px;
}



    </style>
</head>



<?php

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

<?php

if(isset($_GET['passid'])){
        $id=$_GET['passid'];
}
?>

<body>
   


    <div class="container">
        <div class="list">
            <ul>
                <li  class="active"><a>Driver Profile</a></li>
                <li><a href="myCars.php?driver=<?php echo $id; ?>" class="btn">My Cars</a><br></li>
                <li><a href="drivenow.php?driver=<?php echo $id; ?>" class="btn">My Bookings</a></li>
                <li><a href="../index.php">Log Out</a></li>
                        
            </ul>
        </div>
        <br><br><br><br><br><br>
         <h1 id="header">Driver Profile</h1>
             <div class="content">



                <form>
                    <table  id="profile" name="profile">
            



<?php
$sql3="SELECT * FROM hub WHERE id='$id' ";
$res=mysqli_query($connection,$sql3); 

foreach($res as $row) { ?>   



                        
                        <tr>
                            <td>  <p>Driver NIC -</p> </td>
                            <td>  
                                <div class=outline> 
                                <div class=data>  
                                                                   <?php 
                                                                    echo $row['id'];
                                                                   ?>

                                </div>
                                </div> 
                            </td>
                           
                        </tr>


                        <tr>
                            <td>  <p>Name -</p> </td>
                            <td>    
                                <div class=outline> 
                                <div class=data>  
                                                                  <?php 
                                                                    echo $row['name'];
                                                                   ?>


                                </div>
                                </div>  
                            </td>
                        </tr>


                        <tr>
                            <td>  <p>Mobile -</p> </td>
                            <td>    <div class=outline> 
                                <div class=data>  
                                                                   <?php 
                                                                     echo $row['mobile'];
                                                                   ?>

                                </div>
                                </div> 
                              </td>
                        </tr>



    
                        <tr>
                            <td>  <p>D.O.B -</p> </td>
                            <td>     <div class=outline> 
                                <div class=data>  
                                                                   <?php 
                                                                       echo $row['dob'];
                                                                    ?>

                                </div>
                                </div> 
                             </td>
                        </tr>



                      
                        <tr>
                            <td>  <p>Gender -</p> </td>
                            <td>    <div class=outline> 
                                <div class=data>  
                                                                   <?php 
                                                                     echo $row['gender'];
                                                                    ?>

                                </div>
                                </div> 
                             </td>
                        </tr>



<?php } ?>         




                            
                    </table>
                </form>   
             </div>
        </div>
    </div>
</body>

</html>






