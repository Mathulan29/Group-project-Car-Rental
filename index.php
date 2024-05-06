<?php 
   session_start();
?>
<html>
    <head>
        <title>Home page</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/slideshow.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">

       
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

        
      

        <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include 'header.php'; ?>
        <section>
          <div class="slideshow-container">

              <div class="mySlides fade">
                <img src="images/img/car8.jpg" style="width: 100%;;height: 600px;">
                
              </div>
              
              <div class="mySlides fade">
                <img src="images/img/car9.jpg" style="width:100%;height: 600px;">
               
              </div>
              
              <div class="mySlides fade">
                <img src="images/img/car7.JPG" style="width:100%;height: 600px;">
                
              </div>
              
              </div>
              <br>
              
              <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
              </div>
              
              <script>
              let slideIndex = 0;
              showSlides();
              
              function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
              }
              </script>
              
              </section>
              <section class="cars" id="cars">
                <div class="heading">
                    <span>All Types of Vehicles</span>
                    <h2>We have all types of SUVs & Cabs, Cars, Vans & Buses, Utility Vehicles</h2>
                    <p>Lorem epsum dolr sit jdnqwjduhdu abubuhb <br>jkkfjkbfjb </p>
                </div>
                <div class="cars-container container">
                    <div class="box">
                        <img src="images/img/display6.jfif" alt="">
                        <h2>Cars</h2>
                    </div>
                    <div class="box">
                        <img src="images/img/display3.jfif" alt="">
                        <h2>SUVs</h2>
                    </div>
                    <div class="box">
                        <img src="images/img/display9.jfif" alt="">
                        <h2>Vans</h2>
                    </div>
                    <div class="box">
                        <img src="images/img/display4.jfif" alt="">
                        <h2>Jeeps</h2>
                    </div>
                    <div class="box">
                        <img src="images/img/car5.jpg" alt="">
                        <h2>Cars</h2>
                    </div>
                    <div class="box">
                        <img src="images/img/display2.jfif" alt="">
                        <h2>Utility Vehicles</h2>
                    </div>
                </div>
            </section>
            <br><br>
            <?php include 'php/footer.php'; ?>
      </body>
</html>
