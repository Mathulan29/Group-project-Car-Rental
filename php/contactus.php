<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/custyles.css">
    
    <title>Help</title>
</head>

<body>
    <div class="main">
        <h1>Let's Get In Touch</h1>

        <div class="container">
            
            <div class="content">

                <h3>HELP</h3>

                <form action="cudata.php" method="post" autocomplete="off">

                    <input type="text" name="name" placeholder="Name" required>

                    <input type="email" name="email" placeholder="Email" required>

                    <input type="tel" name="telephone" placeholder="Telephone" required>

                    <input type="text" name="subject" placeholder="Subject" required>

                    <textarea name="message" placeholder="Your Message"></textarea>    

                    <button type="submit" class="btn">SEND</button>

                </form>

            </div>


            <div class="form-image">
                <img src="../images/contactImages/image.png" alt="Form Image">
            </div>

        </div>

    </div>
    <?php include 'footer.php'; ?>

</body>

</html>