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
    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>
   

     <!-- Our Featured Works Area -->
    <section class="featured_works row" data-stellar-background-ratio="0.3">
        <div class="tittle wow fadeInUp">
            <p>   <br>   </p>
            <h2>our breeze block</h2>
        </div>
        <div class="featured_gallery">
			<form method="post" action="parpaing execution.php">
				<?php
					for ($nombre_de_lignes = 1 ; $nombre_de_lignes <= $_SESSION['nb_parpaing'] ; $nombre_de_lignes++)
					{
				?>
						<div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
							<img src= <?php echo 'images/im' . $nombre_de_lignes . '.jpg' ; ?> alt="">
							<div class="gallery_hover">
								<h4>1 Palette - <?php echo $_SESSION['nom_parpaing'][$nombre_de_lignes-1]['name'] . ' - ' . $_SESSION['nom_parpaing'][$nombre_de_lignes-1]['description'] ; ?></h4>
								<h4><input type="submit" name=<?php echo 'submit' . $nombre_de_lignes . '+' ; ?> value="commander" class="submit_commande"/></h4>
							</div>
						</div>
				<?php
					}
				?>
			</form>

        </div>
    </section>
    <!-- End Our Featured Works Area -->

    <?php include('footer.php'); ?>
</body>
</html>
