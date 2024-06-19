<?php

include("../connect.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $idea = $_POST["idea"];
    $suggestions = $_POST["suggestions"];
    

    // Table name 'contacts'
    $sql = "INSERT INTO feedback (username, name, idea, suggestions) VALUES ('$username', '$name', '$idea', '$suggestions')";


    if ($connection->query($sql) === TRUE) {
        
        // Success message
        $successmsg = "Message was sent successfully!";
        
        // Alert with the success message and redirect.
        echo '<script>
                alert("'.$successmsg.'"); 
                window.location.href = "feedback.php"; 
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
