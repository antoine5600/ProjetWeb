<!DOCTYPE html>
<html>
	<body>
		
		<?php include('headPanier.php'); ?>	
		
		 <!-- Navigation -->

 		 <?php include('navbar.php'); ?>

		<div class="container-fluid breadcrumbBox text-center">
			<ol class="breadcrumb">
				<li class="active"><a href="#">Order</a></li>
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
					<li class="row">
						<span class="quantity">1</span>
						<span class="itemName">Brique Porotherm</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$49.95</span>
					</li>
					<li class="row">
						<span class="quantity">50</span>
						<span class="itemName">Béton cellulaire</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$5.00</span>
					</li>
					<li class="row">
						<span class="quantity">20</span>
						<span class="itemName">Parpaing creux</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$919.99</span>				
					</li>
					<li class="row totals">
						<span class="itemName">Total:</span>
						<span class="price">$974.94</span>
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