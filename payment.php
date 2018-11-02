
<?php
	include('server_objet_a_vendre.php') ;
?>
<!DOCTYPE html>
<html>

	<body>
		
		<?php include('headerPayment.php'); ?>	
		
		 <!-- Navigation -->

 		 <?php include('navbar.php'); ?>

 		 <div class="container-fluid breadcrumbBox text-center">
			<ol class="breadcrumb">
				<?php 
					if ( $_SESSION['nombre_total_objet_dans_panier'] > 0 )
					{
						
				?>
						<li><a href="panier.php">Order</a></li>
						<li class="active">Payment</li>
						
				<?php
					}
				?>
			</ol>
		</div>




 		 <h2>Paiements</h2>
		<div class="row">
			<div class="col-75">
				<div class="container">
					<form method="post" action="payment_execution.php">
						<div class="row">
							<div class="col-50">
								<h3>Addresse de livraison</h3>
								<?php
									if ( $nb_adr_client != 0 )
									{
										$compteur_pour_post = 1 ; // les id en sql commencent à 1
										foreach ( $adr_client as $addresses )
										{
											if ( $addresses['Name'] != "" )
											{
								?>
												<input type="radio" name="choix_adresse" value="adresse<?php echo $compteur_pour_post ?>" id="adresse<?php echo $compteur_pour_post ?>" /> <label for="adresse<?php echo $compteur_pour_post ?>"><?php echo $addresses['Name'] ; ?></label>
								<?php
											}
											else
											{
								?>
												<input type="radio" name="choix_adresse" value="adresse<?php echo $compteur_pour_post ?>" id="adresse<?php echo $compteur_pour_post ?>" /> <label for="adresse<?php echo $compteur_pour_post ?>"><?php echo $addresses['Street'] . ', ' . $addresses['Additional'] . ', ' . $addresses['City'] . ' ' . $addresses['Postcode'] . ', ' . $addresses['Country'] ; ?></label>
								<?php
											}
											$compteur_pour_post++ ;
										}
									}
								?>
								<input type="radio" name="choix_adresse" value="adresseNEW" id="adresseNEW" /> <label for="adresseNEW"> Nouvelle Adresse (remplir les champs ci-dessous)</label>
								
								<label for="addr_name"><i class="fa fa-user"></i> Nom de l'adresse </label>
								<input type="text" id="addr_name" name="addr_name" placeholder="Chez moi">
								<label for="street"><i class="fa fa-address-card-o"></i> Rue</label>
								<input type="text" id="street" name="street" placeholder="15 Rue Tohannic">
								<label for="additional"><i class="fa fa-address-card-o"></i> Informations Supplémentaires</label>
								<input type="text" id="additional" name="additional" placeholder="3eme étage, porte numéro 307">
								<label for="country">Pays</label>
								<input type="text" id="country" name="country" placeholder="France">
								<div class="row">
									<div class="col-50">
										<label for="city"><i class="fa fa-institution"></i> Ville </label>
										<input type="text" id="city" name="city" placeholder="Vannes">
									</div>
									<div class="col-50">
										<label for="postcode">Code Postal</label>
										<input type="text" id="postcode" name="postcode" placeholder="56000">
									</div>
								</div>
							</div>
							<div class="col-50">
								<h3>Paiement</h3>
								<label for="fname">Cartes acceptées</label>
								<div class="icon-container">
									<input type="radio" name="carte" value="visa" id="visa" /> <label for="visa"><i class="fa fa-cc-visa" style="color:navy;"></i></label>
									<input type="radio" name="carte" value="amex" id="amex" /> <label for="amex"><i class="fa fa-cc-amex" style="color:blue;"></i></i></label>
									<input type="radio" name="carte" value="mastercard" id="mastercard" /> <label for="mastercard"><i class="fa fa-cc-mastercard" style="color:red;"></i></i></label>
									<input type="radio" name="carte" value="discover" id="discover" /> <label for="discover"><i class="fa fa-cc-discover" style="color:orange;"></i></i></label>
								</div>
								<label for="cname">Propriétaire de la carte</label>
								<input type="text" id="cardname" name="cardname" placeholder="John More Doe">
								<label for="ccnum">Numéro de carte</label>
								<input type="text" id="cardnumber" name="cardnumber" placeholder="1111-2222-3333-4444">
								<label for="expmonth">Mois d'expiration</label>
								<input type="text" id="expmonth" name="expmonth" placeholder="September">
								<div class="row">
									<div class="col-50">
										<label for="expyear">Année d'expiration</label>
										<input type="text" id="expyear" name="expyear" placeholder="2018">
									</div>
									<div class="col-50">
										<label for="cvv">CVV</label>
										<input type="text" id="cvv" name="cvv" placeholder="352">
									</div>
								</div>
							</div>
						</div>
						<input type="submit" name="validation_commande" value="Continue to checkout" class="btn">
					</form>
				</div>
			</div>
			<div class="col-25">
				<div class="container">
					<h4>Panier <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $_SESSION['nombre_total_objet_dans_panier'] ; ?></b></span></h4>
					<?php
						foreach ( $_SESSION['id_objet_dans_mon_panier'] as $objet_dans_panier )
						{
							if ( $_SESSION['parpaing' . $objet_dans_panier] != 0 )
							{
					?>
								<p><a href="#"><?php echo $_SESSION['parpaing' . $objet_dans_panier]; ?> x <?php echo $_SESSION['nom_parpaing'][$objet_dans_panier-1]['name'] . ' - ' . $_SESSION['nom_parpaing'][$objet_dans_panier-1]['description'] ; ?></a> <span class="price"><?php echo $_SESSION['parpaing' . $objet_dans_panier]*$_SESSION['nom_parpaing'][$objet_dans_panier-1]['price']; ?>€</span></p>
					<?php
							}
						}
					?>
					<hr>
					<?php
						$prix_total = 0 ;
						foreach ( $_SESSION['id_objet_dans_mon_panier'] as $objet_dans_panier )
						{
							$prix_total += $_SESSION['parpaing' . $objet_dans_panier] * $_SESSION['nom_parpaing'][$objet_dans_panier-1]['price'] ;
						}
					?>
					<p>Total <span class="price" style="color:black"><b><?php echo $prix_total ; ?></b></span></p>
				
				</div>
			</div>
		</div>



 		 <?php include('footer.php'); ?>

	</body>
</html>
