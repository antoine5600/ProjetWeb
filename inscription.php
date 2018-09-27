<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--vie-->
        <title>Topbuilder Construction Template</title>

        <!-- Favicon -->
        <link rel="icon" href="images/favicon.png" type="image/x-icon" />
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Animate CSS -->
        <link href="vendors/animate/animate.css" rel="stylesheet">
        <!-- Icon CSS-->
        <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
        <!-- Camera Slider -->
        <link rel="stylesheet" href="vendors/camera-slider/camera.css">
        <!-- Owlcarousel CSS-->
        <link rel="stylesheet" type="text/css" href="vendors/owl_carousel/owl.carousel.css" media="all">

        <!--Theme Styles CSS-->
        <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]--></head>

<body>
    <?php include('navbar.php'); ?>

    <!-- Collect information for inscription -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info send_message" id="partie_gauche">
                    <h2>Inscription</h2>
                    <form method="post" action="register.php" class="form-inline contact_box">
                        <?php include('errors.php'); ?>
                        <label class="main-label" for="bday">Civilit&eacute; * </label><br />
                            <input type="hidden" id="civilityhidden" name="dwfrm_profile_customer_title" value="1" />
                            <input type="radio" id="title_1" class="active" name="dwfrm_profile_customer_title" value="1" checked />
                            <label class="civil" for="title_1">Madame</label>
                            <input type="radio" id="title_2" name="dwfrm_profile_customer_title" value="2" />
                            <label class="civil" for="title_2">Monsieur</label><br />
                        <label class="main-label" for="bday">Prénom *</label>
                            <input type="text" class="form-control input_box" name="username" value="<?php echo $username; ?>" >
                        <label class="main-label" for="bday">Nom *</label>
                            <input type="text" class="form-control input_box">
                        <label class="main-label" for="bday">Email *</label>
                            <input type="text" class="form-control input_box" name="email" value="<?php echo $email; ?>">
                        <label class="main-label" for="bday">Date de naissance *</label>
                            <input type="date" class="form-control input_box" id="bday" name="bday">
                        <label class="main-label" for="bday">Mot de passe *</label>
                            <input type="password" class="form-control input_box" name="password_1">
                        <label class="main-label" for="bday">Confirmation Mot de passe *</label>
                            <input type="password" class="form-control input_box" type="password" name="password_2">
                        <button type="submit" class="btn btn-default" name="reg_user">S'inscrire</button>
                        <p>* Champs obligatoires</p>
                    </form>
                </div>
                <!-- Collect information for connection -->
                <div class="col-sm-6 contact_info send_message">
                    <h2>Connexion</h2>
                    <form method="post" action="inscription.php" class="form-inline contact_box">
                        <?php include('errors.php'); ?>
                    <label class="main-label" for="bday">Email</label>
                        <input type="text" name="username" class="form-control input_box" value="">
                            <label class="main-label" for="bday">Mot de passe</label>
                        <input type="password" name="password"class="form-control input_box">
                        <button type="submit" class="btn btn-default" name="login_user">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

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
            Copyright 2017 All rights reserved. Designed by <a href="https://colorlib.com">Colorlib.</a>
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
    <!-- Lightbox JS -->
    <script src="vendors/lightbox/js/lightbox.min.js"></script>
    <!-- Theme JS -->
    <script src="js/theme.js"></script>
</body>
</html>
