<?php 
    include('server_objet_a_vendre.php') ;

  /*if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: inscription.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: inscription.php");
  }*/
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <?php include('header.php');  ?>
    <!-- Preloader -->
    <div class="preloader"></div>

	<!-- Top Header_Area -->

	<!-- End Top Header_Area -->

	<!-- Header_Area -->
   
	<!-- End Header_Area -->

    <!-- Banner area -->
  
    <!-- End Banner area -->

    <!-- End About Us Area -->


    <!-- Our Features Area -->
    <section class="our_feature_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Confirmation Paiement</h2>
            </div>
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/rebranding/illustrations/request-sent.svg" alt="">
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                    <div class="media">
                        <div class="media-left">
                            <a href="index.php">
                                <i class="fa fa-rocket" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Confirmation</a>
                            <p>Votre demande a bien été envoyée.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Features Area -->

    <!-- Our Partners Area -->
    
    <!-- End Our Team Area -->

    <!-- Footer Area -->
    
    <!-- End Footer Area -->

    <!-- jQuery JS -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Animate JS -->
    <script src="vendors/animate/wow.min.js"></script>
    <!-- Camera Slider -->
    <script src="vendors/camera-slider/jquery.easing.1.3.js"></script>
    <script src="vendors/camera-slider/camera.min.js"></script>
    <!-- Isotope JS -->
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope.pkgd.min.js"></script>
    <!-- Progress JS -->
    <script src="vendors/Counter-Up/jquery.counterup.min.js"></script>
    <script src="vendors/Counter-Up/waypoints.min.js"></script>
    <!-- Owlcarousel JS -->
    <script src="vendors/owl_carousel/owl.carousel.min.js"></script>
    <!-- Stellar JS -->
    <script src="vendors/stellar/jquery.stellar.js"></script>
    <!-- Theme JS -->
    <script src="js/theme.js"></script>
</body>
</html>
