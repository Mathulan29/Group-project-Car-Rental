<?php

include("../connect.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Table name 'contacts'
    $sql = "INSERT INTO contacts (name, email, telephone, subject, message) VALUES ('$name', '$email', '$telephone', '$subject', '$message')";


    if ($connection->query($sql) === TRUE) {
        
        // Success message
        $successmsg = "Message was sent successfully!";
        
        // Alert with the success message and redirect.
        echo '<script>
                alert("'.$successmsg.'"); 
                window.location.href = "../index.php"; 
            </script>';
    } 
    
    else {
        
        // Error message
        $errormsg = "Error: " . $sql . "<br>" . $conn->error;
        
        // Alert with the error message
        echo '<script>
                alert("'.$errormsg.'");
            </script>';
    }

}

$connection->close();

?>
