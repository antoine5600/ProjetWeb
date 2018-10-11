<?php
	include('server.php') ;
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
				<li><a href="#">Payment</a></li>
			</ol>
		</div>
		
		<div class="container text-center">

			<div class="col-md-5 col-sm-12">
				<div class="bigcart"></div>
				<h1>Your shopping cart</h1>
				
			</div>
			
			<div class="col-md-7 col-sm-12 text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
					<form method="post" action="panier.php">
					<?php if ( $_SESSION['parpaing'.'1'] != 0 )
					{ ?>
						<li class="row">
							<span class="quantity"><?php if ( $_SESSION['parpaing'.'1'] > 1 ) { echo '<input type="submit" name="submit1-" value="-" class="submit_commande"/>';}?><?php echo $_SESSION['parpaing'.'1']; ?><input type="submit" name="submit1+" value="+" class="submit_commande"/><!--<?php echo $_SESSION['parpaing'.'1']; ?>--></span>
							<span class="itemName">Palette - 84 Blocs béton Creux NF B40 - 15x20x50 cm</span>
							<span class="popbtn"><input type="submit" name="delete_panier1" value="supprimer" class="submit_commande"/><!--<a class="arrow"></a>--></span>
							<span class="price"><?php echo $_SESSION['parpaing'.'1']*1.10; ?>€</span>
						</li>
					<?php } ?>
					<?php if ( $_SESSION['parpaing'.'2'] != 0 )
					{ ?>
						<li class="row">
							<span class="quantity"><?php if ( $_SESSION['parpaing'.'2'] > 1 ) { echo '<input type="submit" name="submit2-" value="-" class="submit_commande"/>';}?><?php echo $_SESSION['parpaing'.'2']; ?><input type="submit" name="submit2+" value="+" class="submit_commande"/><!--<?php echo $_SESSION['parpaing'.'2']; ?>--></span>
							<span class="itemName">palette - 84 Blocs béton Poteau NF B40 - 15x20x50 cm</span>
							<span class="popbtn"><input type="submit" name="delete_panier2" value="supprimer" class="submit_commande"/></span>
							<span class="price"><?php echo $_SESSION['parpaing'.'2']*1.29; ?>€</span>
						</li>
					<?php } ?>
					<?php if ( $_SESSION['parpaing'.'3'] != 0 )
					{ ?>
						<li class="row">
							<span class="quantity"><?php if ( $_SESSION['parpaing'.'3'] > 1 ) { echo '<input type="submit" name="submit3-" value="-" class="submit_commande"/>';}?><?php echo $_SESSION['parpaing'.'3']; ?><input type="submit" name="submit3+" value="+" class="submit_commande"/><!--<input type="number" name="parpaing3" id="parpaing3" min="0" step="1" value="1" /><?php echo $_SESSION['parpaing'.'3']; ?>--></span>
							<span class="itemName">Palette - 70 Blocs béton Creux NF B40 - 20x20x50 cm</span>
							<span class="popbtn"><input type="submit" name="delete_panier3" value="supprimer" class="submit_commande"/></span>
							<span class="price"><?php echo $_SESSION['parpaing'.'3']*1.15; ?>€</span>				
						</li>
					<?php } ?>
					<?php if ( $_SESSION['parpaing'.'4'] != 0 )
					{ ?>
						<li class="row">
							<span class="quantity"><?php if ( $_SESSION['parpaing'.'4'] > 1 ) { echo '<input type="submit" name="submit4-" value="-" class="submit_commande"/>';}?><?php echo $_SESSION['parpaing'.'4']; ?><input type="submit" name="submit4+" value="+" class="submit_commande"/></span>
							<span class="itemName">Palette - 84 Blocs béton Linteau B40 - 15x20x50 cm</span>
							<span class="popbtn"><input type="submit" name="delete_panier4" value="supprimer" class="submit_commande"/></span>
							<span class="price"><?php echo $_SESSION['parpaing'.'4']*1.80; ?>€</span>				
						</li>
					<?php } ?>
					</form>
					<?php
						$tot = 0 ;
						$test = 1 ;
						$tot = $_SESSION['parpaing'.$test]*1.10 ;
						$tot = $_SESSION['parpaing'.'1']*1.10 + $_SESSION['parpaing'.'2']*1.29 + $_SESSION['parpaing'.'3']*1.15 + $_SESSION['parpaing'.'4']*1.80 ;
					?>
					<li class="row totals">
						<span class="itemName">Total: </span>
						<span class="price"><?php echo $tot ?>€</span>
						<span class="order"> <a class="text-center">ORDER</a></span>
					</li>
				</ul>
			</div>

		</div>

		<!-- The popover content -->

		<div id="popover" style="display: none">
			<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="#"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		
		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="js/bootstrap1.js"></script>
		<script src="js/customjs1.js"></script>

		<?php include('footer.php'); ?>

	</body>
	
</html>