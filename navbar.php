<?php
include('header.php'); 
//session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>
<!-- Preloader -->
<style>
.panier_searchFrom{
  width: 100px;
  background: #f6b60b;
  color: #fff;
  padding: 0;
  text-align: center;
  margin-left: 15px;
  height: 101px;
  margin-top: -1px;
  height: 45px;
}

.panier_searchFrom:hover .panier_searchFrom:focus{
  color: #222222;
}
</style>
<div class="preloader"></div>

<!-- Header_Area -->
<nav class="navbar navbar-default header_aera" id="main_navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-2 p0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-10 p0">
            <div class="collapse navbar-collapse" id="min_navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu</a>
                        <ul class="dropdown-menu">
                            <li><a href="parpaing.php">parpaing</a></li>
                            <li><a href="#">Ciment</a></li>
                        </ul>
                    </li>
                    <li><a href="magasin.php">Magasin</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php  if (isset($_SESSION['username'])) : ?>
                        <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon Compte</a>
                        <ul class="dropdown-menu">
                            <?php  if ($_SESSION['user_permission'] =='2') : ?>
                            <li id="repnavbar"><a href="myaccount.php">Dashboard </a></li>
                            <?php endif ?>
							<li id="repnavbar"><a href="mes_commandes.php">Mes commandes</a></li>
                            <li id="repnavbar"><a href="index.php?logout='1'">logout</a></li>
                        </ul>
                    </li>              
                    <?php endif ?>
                    <?php if (!isset($_SESSION['username'])) : ?>
                        <li><a href="inscription.php">Se connecter</a></li>
                    <?php endif ?>
           <!--                <li><a href="#" class="nav_searchFrom"><i class="fa "></i></a></li>-->
                    <li><a href="panier.php" class="panier" id="panierStyle"><i class="fas fa-cart-arrow-down"><?php if ( $_SESSION['nombre_total_objet_dans_panier'] > 0 ) {echo $_SESSION['nombre_total_objet_dans_panier'] ;} ?></i></a></li>
                    </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container -->
</nav>
    <!-- End Header_Area -->