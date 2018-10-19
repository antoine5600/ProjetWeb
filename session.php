<?php
	session_start();
	
	// gestion panier
	if ( isset( $_SESSION['nombre_total_objet_dans_panier'] ) == false )
	{
		$_SESSION['nombre_total_objet_dans_panier'] = 0 ;
	}
	if ( isset( $id_post ) and $id_post > 0 and $id_post <= $_SESSION['nb_parpaing'] ) // les and servent à protéger contre quelqu'un qui modifirait manuellement les names des submit
	{
		if ( isset( $_SESSION['id_objet_dans_mon_panier'] ) == false )
		{
			$_SESSION['id_objet_dans_mon_panier'] = array() ;
		}
		if ( in_array( $id_post , $_SESSION['id_objet_dans_mon_panier'] ) == false )
		{
			$_SESSION['id_objet_dans_mon_panier'][] = $id_post ;
			$_SESSION['parpaing'.$id_post] = 1 ;
			$_SESSION['nombre_total_objet_dans_panier']++ ;
		}
		else
		{
			if ( preg_match( '#^[0-9]+\+$#' , $val_post ) )
			{
				$_SESSION['parpaing'.$id_post] = $_SESSION['parpaing'.$id_post] + 1;
				$_SESSION['nombre_total_objet_dans_panier']++ ;
			}
			elseif ( preg_match( '#^[0-9]+-$#' , $val_post ) )
			{
				$_SESSION['parpaing'.$id_post] = $_SESSION['parpaing'.$id_post] - 1;
				$_SESSION['nombre_total_objet_dans_panier']-- ;
			}
			elseif ( preg_match( '#^[0-9]+$#' , $val_post ) )
			{
				$_SESSION['nombre_total_objet_dans_panier'] -= $_SESSION['parpaing'.$id_post] ;
				$_SESSION['parpaing'.$id_post] = 0 ;
			}
		}
	}
?>