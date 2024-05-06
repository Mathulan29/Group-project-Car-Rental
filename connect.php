
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