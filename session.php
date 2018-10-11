<?php
	session_start();
	
	// gestion panier
	if ( isset( $_SESSION['nombre_total_objet_dans_panier'] ) == false )
	{
		$_SESSION['nombre_total_objet_dans_panier'] = 0 ;
	}
	if ( isset($_SESSION['parpaing'.'1']) )
	{
		for ($nombre_de_parpaing_different = 1 ; $nombre_de_parpaing_different <= 4 ; $nombre_de_parpaing_different++)
		{
			if ( isset($_POST['submit'.$nombre_de_parpaing_different.'+']) )
			{
				$_SESSION['parpaing'.$nombre_de_parpaing_different] = $_SESSION['parpaing'.$nombre_de_parpaing_different] + 1;
				$_SESSION['nombre_total_objet_dans_panier']++ ;
			}
			if ( isset($_POST['submit'.$nombre_de_parpaing_different.'-']) )
			{
				$_SESSION['parpaing'.$nombre_de_parpaing_different] = $_SESSION['parpaing'.$nombre_de_parpaing_different] - 1;
				$_SESSION['nombre_total_objet_dans_panier']-- ;
			}
			if ( isset($_POST['delete_panier'.$nombre_de_parpaing_different]) )
			{
				$_SESSION['nombre_total_objet_dans_panier'] -= $_SESSION['parpaing'.$nombre_de_parpaing_different] ;
				$_SESSION['parpaing'.$nombre_de_parpaing_different] = 0 ;
			}
		}
	}
	else
	{
		$_SESSION['parpaing'.'1'] = 0 ;
		$_SESSION['parpaing'.'2'] = 0 ;
		$_SESSION['parpaing'.'3'] = 0 ;
		$_SESSION['parpaing'.'4'] = 0 ;
		if ( isset($_POST['submit1']) )
		{
			$_SESSION['parpaing'.'1'] = 1;
			$_SESSION['nombre_total_objet_dans_panier']++ ;
		}
		elseif ( isset($_POST['submit2']) )
		{
			$_SESSION['parpaing'.'2'] = 1;
			$_SESSION['nombre_total_objet_dans_panier']++ ;
		}
		elseif ( isset($_POST['submit3']) )
		{
			$_SESSION['parpaing'.'3'] = 1;
			$_SESSION['nombre_total_objet_dans_panier']++ ;
		}
		elseif ( isset($_POST['submit4']) )
		{
			$_SESSION['parpaing'.'4'] = 1;
			$_SESSION['nombre_total_objet_dans_panier']++ ;
		}
	}
?>