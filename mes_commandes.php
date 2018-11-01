<?php
	include('server_objet_a_vendre.php') ;
	
	if ( isset( $adresses_commandes ) == true )
	{
		foreach ( $adresses_commandes as $adr )
		{
?>
			<p> numero commande : <?php echo $adr['id_command'] . ', adresse : ' . $adr['Name'] . ' (' . $adr['Street'] . ' ' . $adr['Additional'] . ', ' . $adr['City'] . ' ' . $adr['Postcode'] . ', ' . $adr['Country'] . ')' ; ?> </p>
<?php
		}
	}
?>