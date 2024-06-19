<!DOCTYPE html>
<html>
<head>
    <title> Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #3498db, #2980b9); /* Gradient background */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2> Feedback Form</h2>
    <form action="feedbackdb.php" method="post">
       <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="idea">Your Idea:</label><br>
        <textarea id="idea" name="idea" rows="4" required></textarea><br>
        
        <label for="suggestions">Suggestions:</label><br>
        <textarea id="suggestions" name="suggestions" rows="4" required></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
