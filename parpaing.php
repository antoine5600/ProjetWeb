<?php 
  session_start(); 

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
    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>
   

     <!-- Our Featured Works Area -->
    <section class="featured_works row" data-stellar-background-ratio="0.3">
        <div class="tittle wow fadeInUp">
            <p>   <br>   </p>
            <h2>our breeze block</h2>
        </div>
        <div class="featured_gallery">
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/im1.jpg" alt="">
                <div class="gallery_hover">
                    <h4>1 Palette - 84 Blocs béton Creux NF B40 - 15x20x50 cm</h4>
                    <a href="#">commander</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/im2.jpg" alt="">
                <div class="gallery_hover">
                    <h4>1 palette - 84 Blocs béton Poteau NF B40 - 15x20x50 cm</h4>
                    <a href="#">commander</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/im3.jpg" alt="">
                <div class="gallery_hover">
                    <h4>1 Palette - 70 Blocs béton Creux NF B40 - 20x20x50 cm</h4>
                    <a href="#">commander</a>
                </div>
            </div>

             <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/im4.jpg" alt="">
                <div class="gallery_hover">
                    <h4>1 Palette - 84 Blocs béton Linteau B40 - 15x20x50 cm</h4>
                    <a href="#">commander</a>
                </div>
            </div>

        </div>
    </section>
    <!-- End Our Featured Works Area -->

    <?php include('footer.php'); ?>
</body>
</html>