<?php
	include('server_objet_a_vendre.php') ;
?>
<!DOCTYPE html>
<html>
	<body>
		
		<?php include('header.php'); ?>	
		
		 <!-- Navigation -->

 		 <?php include('navbar.php'); ?>

		<div class="container-fluid breadcrumbBox text-center">
			<ol class="breadcrumb">
				<li class="active">Order</li>
				<li><a href="payment.php">Payment</a></li>
			</ol>
		</div>
		
		<div class="container text-center">

			<div class="col-md-5 col-sm-12">
				<div class="bigcart"></div>
				<h1>Your shopping cart</h1>
				
			</div>
			<?php 
				if ( $_SESSION['nombre_total_objet_dans_panier'] > 0 )
				{
					
			?>
			<div class="col-md-7 col-sm-12 text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
					<form method="post" action="panier execution.php">
						<?php
							foreach ( $_SESSION['id_objet_dans_mon_panier'] as $objet_dans_panier )
							{
						?>
								<?php if ( $_SESSION['parpaing' . $objet_dans_panier] != 0 )
									{
								?>
									<li class="row">
										<span class="quantity"><?php if ( $_SESSION['parpaing' . $objet_dans_panier] > 1 ) { echo '<input type="submit" name="submit' . $objet_dans_panier . '-" value="-" class="submit_commande"/>';}?><?php echo $_SESSION['parpaing' . $objet_dans_panier]; ?><input type="submit" name="submit<?php echo $objet_dans_panier ?>+" value="+" class="submit_commande"/></span>
										<span class="itemName">Palette - <?php echo $_SESSION['nom_parpaing'][$objet_dans_panier-1]['name'] . ' - ' . $_SESSION['nom_parpaing'][$objet_dans_panier-1]['description'] ; ?></span>
										<span class="popbtn"><input type="submit" name="delete_panier<?php echo $objet_dans_panier ?>" value="X" class="submit-Delete"></span>
										<!--<span class="popbtn"><input type="submit" name="delete_panier<?php echo $objet_dans_panier ?>" value="supprimer" class="submit_commande"/></span> -->
										<span class="price"><?php echo $_SESSION['parpaing' . $objet_dans_panier]*$_SESSION['nom_parpaing'][$objet_dans_panier-1]['price']; ?>€</span>
									</li>
								<?php
									}
								?>
						<?php
							}
						?>
					</form>
					<?php
						$prix_total = 0 ;
						foreach ( $_SESSION['id_objet_dans_mon_panier'] as $objet_dans_panier )
						{
							$prix_total += $_SESSION['parpaing' . $objet_dans_panier] * $_SESSION['nom_parpaing'][$objet_dans_panier-1]['price'] ;
						}
					?>
					<li class="row totals">
						<span class="itemName">Total: </span>
						<span class="price"><?php echo $prix_total ?>€</span>
						<span class="order"> <a href="payment.php" class="text-center">ORDER</a></span>
					</li>
				</ul>
			</div>
			<?php 
				}
				else
				{
					echo 'aucun article dans le panier' ;
				}
			?>
		</div>

		<!-- The popover content -->

		
		
		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="js/bootstrap1.js"></script>
		<script src="js/customjs1.js"></script>

		<?php include('footer.php'); ?>

	</body>
	
</html>