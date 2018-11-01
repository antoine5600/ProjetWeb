<?php
	$val_post = preg_replace('#^adresse([0-9]+|NEW)$#isU', '$1', $_POST['choix_adresse'] );
	$id_post = preg_replace('#^NEW$#isU', '-1', $val_post);
	if ( preg_match( '#^[0-9]+$#isU' , $id_post ) == true or ( $id_post == -1 and $_POST['street'] != "" and $_POST['country'] != "" and $_POST['city'] != "" and preg_match( '#^[0-9]+$#isU' , $_POST['postcode'] ) == true ) )
	{
		include( 'server_objet_a_vendre.php' ) ;
		header('Location: confirmation_paiement.php') ;
	}
	else
	{
		header('Location: payment.php') ;
	}
?>