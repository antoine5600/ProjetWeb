<?php
	include('server_objet_a_vendre.php') ;
?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/pay.css" rel="stylesheet">
	</head>
	<body>
		<h2>Payments</h2>
		<div class="row">
			<div class="col-75">
				<div class="container">
					<form method="post" action="/action_page.php">
						<div class="row">
							<div class="col-50">
								<h3>Billing Address</h3>
								<label for="fname"><i class="fa fa-user"></i> Full Name</label>
								<input type="text" id="firstname" name="firstname" value=<?php echo $_SESSION['user_info']['First_name'] . ' ' . $_SESSION['user_info']['Name'] ; ?>>
								<label for="email"><i class="fa fa-envelope"></i> Email</label>
								<input type="text" id="email" name="email" value=<?php echo $_SESSION['user_info']['Mail'] ?>>
								<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
								<input type="text" id="address" name="address" placeholder="542 W. 15th Street">
								<label for="city"><i class="fa fa-institution"></i> City</label>
								<input type="text" id="city" name="city" placeholder="New York">
								<div class="row">
									<div class="col-50">
										<label for="state">State</label>
										<input type="text" id="state" name="state" placeholder="NY">
									</div>
									<div class="col-50">
										<label for="zip">Zip</label>
										<input type="text" id="zip" name="zip" placeholder="10001">
									</div>
								</div>
							</div>
							<div class="col-50">
								<h3>Payment</h3>
								<label for="fname">Accepted Cards</label>
								<div class="icon-container">
									<input type="radio" name="carte" value="visa" id="visa" /> <label for="visa"><i class="fa fa-cc-visa" style="color:navy;"></i></label>
									<input type="radio" name="carte" value="amex" id="amex" /> <label for="amex"><i class="fa fa-cc-amex" style="color:blue;"></i></i></label>
									<input type="radio" name="carte" value="mastercard" id="mastercard" /> <label for="mastercard"><i class="fa fa-cc-mastercard" style="color:red;"></i></i></label>
									<input type="radio" name="carte" value="discover" id="discover" /> <label for="discover"><i class="fa fa-cc-discover" style="color:orange;"></i></i></label>
								</div>
								<label for="cname">Name on Card</label>
								<input type="text" id="cardname" name="cardname" placeholder="John More Doe">
								<label for="ccnum">Credit card number</label>
								<input type="text" id="cardnumber" name="cardnumber" placeholder="1111-2222-3333-4444">
								<label for="expmonth">Exp Month</label>
								<input type="text" id="expmonth" name="expmonth" placeholder="September">
								<div class="row">
									<div class="col-50">
										<label for="expyear">Exp Year</label>
										<input type="text" id="expyear" name="expyear" placeholder="2018">
									</div>
									<div class="col-50">
										<label for="cvv">CVV</label>
										<input type="text" id="cvv" name="cvv" placeholder="352">
									</div>
								</div>
							</div>
						</div>
						<label><input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing</label>
						<input type="submit" value="Continue to checkout" class="btn">
					</form>
				</div>
			</div>
			<div class="col-25">
				<div class="container">
					<h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $_SESSION['nombre_total_objet_dans_panier'] ; ?></b></span></h4>
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
	</body>
</html>
