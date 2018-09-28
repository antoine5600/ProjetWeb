<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: inscription.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: inscription.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
     <?php include("header.php"); ?>
     <?php include('navbar.php'); ?>

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">location</a>
                            <a href="#">phone</a>
                            <a href="#">fax</a>
                            <a href="#">email</a>
                        </div>
                        <div class="address">
                            <a href="#">Sector # 10, Road # 05, Plot # 31, Uttara, <br> Dhaka 1230 </a>
                            <a href="#">+880 123 456 789</a>
                            <a href="#">(626) 935-3026</a>
                            <a href="#">info@thethemspro.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Send Us a Message</h2>
                    <form id="contactForm" action="contact.php" method="POST" >
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Your name *</label>
                                    <input type="text" value="" maxlength="100" class="form-control" name="name" id="name" required="" aria-required="true">
                                </div>
                                <div class="col-md-6">
                                    <label>Your email address *</label>
                                    <input type="email" value="" maxlength="100" class="form-control" name="email" id="email" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Subject</label>
                                    <input type="text" value="" maxlength="100" class="form-control" name="subject" id="subject" required="" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Message *</label>
                                    <textarea maxlength="5000" rows="10" class="form-control" name="message" id="message" required="" aria-required="true"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" name="contact"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->

    <!-- Footer Area -->
    <footer class="footer_area">
        <div class="container">
            <div class="footer_row row">
                <div class="col-md-3 col-sm-6 footer_about">
                    <h2>ABOUT OUR COMPANY</h2>
                    <img src="images/footer-logo.png" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <ul class="socail_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer_about quick">
                    <h2>Quick links</h2>
                    <ul class="quick_link">
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Building Construction</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Home Renovation</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Hardwood Flooring</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Repairing Of Roof</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Commercial Construction</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Concreate Transport</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer_about">
                    <h2>Twitter Feed</h2>
                    <a href="#" class="twitter">@colorlib: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</a>
                    <a href="#" class="twitter">@colorlib: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</a>
                </div>
                <div class="col-md-3 col-sm-6 footer_about">
                    <h2>CONTACT US</h2>
                    <address>
                        <p>Have questions, comments or just want to say hello:</p>
                        <ul class="my_address">
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>info@thethemspro.com</a></li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>+880 123 456 789</a></li>
                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Sector # 10, Road # 05, Plot # 31, Uttara, Dhaka 1230 </span></a></li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
        <div class="copyright_area">
            CCopyright 2017 All rights reserved. Designed by <a href="https://colorlib.com">Colorlib.</a>
        </div>
    </footer>
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
    <!-- Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="vendors/map/topbuilder_map.min.js"></script>
    <!-- Theme JS -->
    <script src="js/theme.js"></script>
</body>
</html>
