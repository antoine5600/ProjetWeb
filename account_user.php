<?php
	include('server_objet_a_vendre.php') ;
	
	echo 'Info personnelle :' ;
	echo '<br />Nom : ' . $_SESSION['username'] ;
	echo '<br />Prenom : ' . $_SESSION['user_firstname'] ;
	echo '<br />email : ' . $_SESSION['email'] ;
	echo '<br />téléphone : ' . $_SESSION['phone_number'] ;
	if ( isset( $adr_client ) == true )
	{
		echo "<table class='table'> ";
            echo "<tr>";
                echo "<th>Mes Adresse</th>";
            echo "</tr>";
			foreach( $adr_client as $adr )
			{
				echo "<tr>";
					echo '<td>' . $adr['Street'] . ' ' . $adr['Additional'] . ', ' . $adr['City'] . ' ' . $adr['Postcode'] . ', ' . $adr['Country'] . '</td>';
				echo "</tr>";
			}
		echo "</table>";
	}
	else
	{
		echo "<br />Aucune adresse connue";
	}
?>