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
  <?php include('header.php'); ?>
        <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
    <!-- Navigation -->

  <?php include('navbar.php'); ?>

    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info send_message" id="partie_gauche">
                    <h2>"Parpaing par parpaing... vers l'avenir !"</h2>
                    <form class="form-inline contact_box">
                        <p>L'entreprise TOPBUILDER reste à votre entière disposition pour de plus amples informations concernant notre stock de matériaux de construction. </p>
                              <?php  if (isset($_SESSION['username'])) : 
                                        if ($_SESSION['type'] == 0) : ?>
                                          <p>Welcome <strong> Simple User</strong></p>
                                        <?php endif ?>
                              <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                            <?php endif ?>
                    </form>
                </div>

    </section>            

 <?php include('footer.php'); ?>
    
</body>
</html>
