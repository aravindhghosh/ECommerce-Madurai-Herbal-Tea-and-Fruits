<?php
  session_start();
  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ECommerce - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slide.css">
    <link rel="stylesheet" href="css/cart.css">
    <?php include 'inc/navbar_head.php' ?>
</head>
<body>
  <!--
    HEADER 
  -->
    <?php include 'inc/header.php' ?>
  <!--
    HEADER  ENDS
  -->
    <!--Slideshow Starts-->
    <div class="slideshow-container">
        <div class="mySlides ">
          <div class="numbertext">1 / 4</div>
          <img src="images/image1.jpg" style="width:100%">
          <div class="text"><strong>Caption Text</strong></div>
        </div>

        <div class="mySlides ">
          <div class="numbertext">2 / 4</div>
          <img src="images/image2.jpg" style="width:100%">
          <div class="text"><strong>Caption Two</strong></div>
        </div>

        <div class="mySlides ">
          <div class="numbertext">3 / 4</div>
          <img src="images/image3.jpg" style="width:100%">
          <div class="text"><strong>Caption Three</strong></div>
        </div>
        <div class="mySlides ">
          <div class="numbertext">4 / 4</div>
          <img src="images/image4.jpg" style="width:100%">
          <div class="text"><strong>Caption Three</strong></div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
        <br>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
          <span class="dot" onclick="currentSlide(4)"></span> 
        </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
    </script>
    <!--Slideshow Ends-->
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              <div class="single_promo_wrap">
                  <div class="single_outer_wrap">
                      <div class="single-promo promo1">
                          <i class=""></i>
                          <p><strong>30 Days return</strong></p>
                      </div>
                  </div>
                  <div class="single_outer_wrap">
                      <div class="single-promo promo2">
                          <i class=""></i>
                          <p><strong>Free shipping</strong></p>
                      </div>
                  </div>
                  <div class="single_outer_wrap">
                      <div class="single-promo promo3">
                          <i class=""></i>
                          <p><strong>Secure payments</strong></p>
                      </div>
                  </div>
                  <div class="single_outer_wrap">
                      <div class="single-promo promo4">
                          <i class=""></i>
                          <p><strong>New products</strong></p>
                      </div>
                  </div>
                </div>  
            </div>
        </div>
    </div> <!-- End promo area -->
    <!-- Footer -->
    <?php include 'inc/footer.php' ?>
    <!-- Footer -->
    <?php include 'inc/navbar.php' ?>
</body>
</html>