<?php 
  include('server_objet_a_vendre.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <?php include('navbar.php'); ?>
    <section class="all_contact_info">
    	<div class="container">
            <div class="row contact_row">
                <div class="col-sm-8 contact_info">
                    <h2>Vos commandes</h2>
                    <div class="location">
						<?php 
							if ( isset( $adresses_commandes ) == true ){
								echo "<table class='table'> ";
						            echo "<tr>";
						            	echo "<th>Numéro Commande</th>";
						                echo "<th>Adresse</th>";
						            echo "</tr>";
									foreach(  $adresses_commandes as $adr )
									{
										echo "<tr>";
											echo '<td>' . $adr['id_command'] . '</td>';
											echo '<td>' . $adr['Street'] . ' ' . $adr['Additional'] . ', ' . $adr['City'] . ' ' . $adr['Postcode'] . ', ' . $adr['Country'] . '</td>';
										echo "</tr>";
									}
							}else{
								echo "Aucune commande";
							}
				        echo "</table>";
					?>
                    </div>
                </div>
			</div>
		</div>
	</section>
<?php include('footer.php'); ?>
</body>
</html>


