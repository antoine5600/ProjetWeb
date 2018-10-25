<?php 
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <?php include('navbar.php'); ?>


    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2>
                    <p>There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">location</a>
                            <a href="#">phone</a>
                            <a href="#">fax</a>
                            <a href="#">email</a>
                        </div>
                        <div class="address">
                            <a href="#">Zone Artisanale de l'ENSIBS <br> FRANCE </a>
                            <a href="#">+880 123 456 789</a>
                            <a href="#">(626) 935-3026</a>
                            <a href="#">info@thethemspro.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Contactez-nous</h2>
                    <form id="contactForm" class="form-inline contact_box" action="contact.php" method="POST" >
                        <div class="col-md-12">
                             <label class="main-label" for="bday">Email *</label>
                            <?php if (isset($_SESSION['username'])) : ?>
                                <input type="email" id="colortext" value=" <?php echo $_SESSION['email']; ?>" maxlength="100" class="form-control input_box" name="email" id="email" required="" aria-required="true">
                            <?php else : ?>
                                <input type="email" id="colortext" maxlength="100" class="form-control input_box" name="email" id="email" required="" aria-required="true">
                            <?php endif ?>
                        </div>
                        <div class="col-md-12">
                            <label class="main-label" for="bday" >Sujet *</label>
                            <input type="text" id="colortext" value="" maxlength="100" class="form-control input_box" name="subject" id="subject" required="" aria-required="true">
                        </div>
                        <div class="col-md-12">
                            <label class="main-label" for="bday">Message *</label>
                            <textarea rows="10" id="colortext" class="form-control input_box" name="message" id="message" aria-required="true"></textarea>
                        </div>
                    <div class="col-md-12">
                        <p>* Champs obligatoires</p>    
                        <button type="submit" class="btn btn-primary btn-lg mb-xlg btn-default" name="contact">Envoyer</button>
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