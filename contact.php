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
<?php include('footer.php'); ?>
</body>
</html>
