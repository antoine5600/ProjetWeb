<?php
	session_start() ;
	if ( isset($_POST['parpaing'.'1']) )
	{
		$_SESSION['parpaing'.'1'] = $_SESSION['parpaing'.'1'] + $_POST['parpaing'.'1'] ;
		$_SESSION['parpaing'.'2'] = $_SESSION['parpaing'.'2'] + $_POST['parpaing'.'2'] ;
		$_SESSION['parpaing'.'3'] = $_SESSION['parpaing'.'3'] + $_POST['parpaing'.'3'] ;
		$_SESSION['parpaing'.'4'] = $_SESSION['parpaing'.'4'] + $_POST['parpaing'.'4'] ;
	}
	else
	{
		$_SESSION['parpaing'.'1'] = 0 ;
		$_SESSION['parpaing'.'2'] = 0 ;
		$_SESSION['parpaing'.'3'] = 0 ;
		$_SESSION['parpaing'.'4'] = 0 ;
		
	}
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
					<li class="row">
						<span class="quantity"><?php echo $_SESSION['parpaing'.'1']; ?></span>
						<span class="itemName">Brique Porotherm</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price"><?php echo $_SESSION['parpaing'.'1']*1.10; ?>€</span>
					</li>
					<li class="row">
						<span class="quantity"><?php echo $_SESSION['parpaing'.'2']; ?></span>
						<span class="itemName">Béton cellulaire</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price"><?php echo $_SESSION['parpaing'.'2']*1.29; ?>€</span>
					</li>
					<li class="row">
						<span class="quantity"><?php echo $_SESSION['parpaing'.'3']; ?></span>
						<span class="itemName">Parpaing creux</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price"><?php echo $_SESSION['parpaing'.'3']*1.15; ?>€</span>				
					</li>
					<?php
						$tot = 0 ;
						$test = 1 ;
						$tot = $_SESSION['parpaing'.$test]*1.10 ;
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