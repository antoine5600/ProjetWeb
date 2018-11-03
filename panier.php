<?php 
	$nom_page_actuelle = preg_replace( '#^(.+)\.php$#isU' , '$1' , basename(__FILE__) ) ;
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
				<?php 
					if ( $_SESSION['nombre_total_objet_dans_panier'] > 0 )
					{
						
				?>
						<li class="active">Order</li>
						<li><a href="payment.php">Payment</a></li>
				<?php
					}
				?>
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
							<form method="post" action="panier_execution.php">
								<?php
									foreach ( $_SESSION['id_objet_dans_mon_panier'] as $objet_dans_panier )
									{
								?>
										<?php if ( $_SESSION['objet' . $objet_dans_panier] != 0 )
											{
										?>
												<li class="row">
													<span class="quantity"><?php if ( $_SESSION['objet' . $objet_dans_panier] > 1 ) { echo '<input type="submit" name="submit' . $objet_dans_panier . '-" value="-" class="submit_commande"/>';}?><?php echo $_SESSION['objet' . $objet_dans_panier]; ?><input type="submit" name="submit<?php echo $objet_dans_panier ?>+" value="+" class="submit_commande"/></span>
													<span class="itemName"><?php echo $_SESSION['info_objet_total'][$objet_dans_panier-1]['name'] . ' - ' . $_SESSION['info_objet_total'][$objet_dans_panier-1]['description'] ; ?></span>
													<span class="popbtn"><input type="submit" name="delete_panier<?php echo $objet_dans_panier ?>" value="X" class="submit-Delete"></span>
													<span class="price"><?php echo $_SESSION['objet' . $objet_dans_panier]*$_SESSION['info_objet_total'][$objet_dans_panier-1]['price']; ?>€</span>
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
									$prix_total += $_SESSION['objet' . $objet_dans_panier] * $_SESSION['info_objet_total'][$objet_dans_panier-1]['price'] ;
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
		
		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="js/bootstrap1.js"></script>
		<script src="js/customjs1.js"></script>

		<?php include('footer.php'); ?>

	</body>
	
</html>