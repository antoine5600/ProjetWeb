<?php
	include('server_objet_a_vendre.php') ;
?>
<!DOCTYPE html>
<html>

	<body>
		<?php include('header.php'); ?>
		<?php include('navbar.php'); ?>
		<section class="all_contact_info">
        	<div class="container">
            	<div class="row contact_row">
            		<div class="contact_info">
			 	 		<h2>Paiements</h2>
							<form method="post" class="form-inline contact_box" action="payment_execution.php">
								<div class="row contact_row">
									<div class="col-sm-6 contact_info send_message">
										<h2>Addresse de livraison</h2>
										<div class="separate">
											<?php
												if ( $nb_adr_client != 0 )
												{
													$compteur_pour_post = 1 ; // les id en sql commencent à 1
													foreach ( $adr_client as $addresses )
													{
														if ( $addresses['Name'] != "" )
														{
											?>
															<div class="separate">
																<input type="radio" name="choix_adresse" value="adresse<?php echo $compteur_pour_post ?>" id="adresse<?php echo $compteur_pour_post ?>" /> 
																<label for="adresse<?php echo $compteur_pour_post ?>"><?php echo $addresses['Name'] ; ?></label>
															</div>
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
											<input type="radio"name="choix_adresse" value="adresseNEW" id="adresseNEW" /> 
											<label for="adresseNEW"> Nouvelle Adresse</label>
										</div>
										<div ="nouvelleAdr">
											<div class="separate">
												<label for="addr_name class="main-label" for="bday""><i class="fa fa-user"></i>Nom de l'adresse </label>
												<input type="text" class="form-control input_box" id="addr_name" name="addr_name">
											</div>
											<div class="separate">
												<label for="street"> Rue</label>
												<input type="text" class="form-control input_box" id="street" name="street">
											</div>
											<div class="separate">
												<label for="additional"><i class="fa fa-address-card-o"></i> Informations Supplémentaires</label>
												<input type="text" class="form-control input_box" id="additional" name="additional">
											</div>
											<div class="separate">
												<label for="country">Pays</label>
												<input type="text" class="form-control input_box" id="country" name="country">
											</div>
											<div class="separate">	
												<label for="city"><i class="fa fa-institution"></i> Ville </label>
												<input type="text" class="form-control input_box" id="city" name="city">
											</div>
											<div class="separate">	
												<label for="postcode">Code Postal</label>
												<input type="text" class="form-control input_box" id="postcode" name="postcode">
											</div>
										</div>
									</div>
									<div class="col-sm-6 all_contact_info">
										<h2>Votre Panier <span class="price"><i class="fa fa-shopping-cart"></i> <b>
											<?php echo $_SESSION['nombre_total_objet_dans_panier'] ; ?></b></span></h2>
											<?php foreach ( $_SESSION['id_objet_dans_mon_panier'] as $objet_dans_panier )
													{
														if ( $_SESSION['objet' . $objet_dans_panier] != 0 )
															{
											?>
											<p><?php echo $_SESSION['objet' . $objet_dans_panier]; ?> x <?php echo $_SESSION['info_objet_total'][$objet_dans_panier-1]['name'] . ' - ' . $_SESSION['info_objet_total'][$objet_dans_panier-1]['description'] ; ?> <span class="price"><?php echo $_SESSION['objet' . $objet_dans_panier]*$_SESSION['info_objet_total'][$objet_dans_panier-1]['price']; ?>€</span></p>
												<?php
															}
													}
											?>
										<hr>
								<?php
									$prix_total = 0 ;
									foreach ( $_SESSION['id_objet_dans_mon_panier'] as $objet_dans_panier )
									{
										$prix_total += $_SESSION['objet' . $objet_dans_panier] * $_SESSION['info_objet_total'][$objet_dans_panier-1]['price'] ;
									}
								?>
								<p>Total <span class="price" ><?php echo $prix_total ; ?></span></p>
									</div>
								
									<div class="col-sm-6 contact_info">
										<h2>Carte de paiement</h2>
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
												<label for="expyear">Année d'expiration</label>
												<input type="text" id="expyear" name="expyear" placeholder="2018">
												<label for="cvv">CVV</label>
												<input type="text" id="cvv" name="cvv" placeholder="352">
										</div>
									</div>	
								</div>
							<input type="submit" name="validation_commande" value="Valider la commande" class="btn">
						</form>
					</div>
				</div>
			</div>
			</div>
		</section>



 		 <?php include('footer.php'); ?>

	</body>
</html>
