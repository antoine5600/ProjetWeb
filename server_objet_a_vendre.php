<?php
	include('server.php') ;
	// connexion à la bdd
	try
	{ // le dernier paramètre permet d'avoir de meilleur message d'erreur
		$bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage()); // permet d'afficher un message d'erreur qui n'affiche pas le login+password dans le message visible par le visiteur
	}
	if ( /*isset( $_SESSION['nb_parpaing'] ) == false*/true ) // évite de perdre du temps de calcul pour une valeur fixe
	{
		$bdd_nb_parpaing_vendable = $bdd->query('SELECT COUNT(*) AS nb_parpaing FROM products') ;
		$nb_parpaing_vendable = $bdd_nb_parpaing_vendable->fetch() ;
		$_SESSION['nb_parpaing'] = $nb_parpaing_vendable['nb_parpaing'] ;
		
		$bdd_nom_parpaing_vendable = $bdd->query('SELECT id_prod , name , description , price FROM products') ;
		$_SESSION['nom_parpaing'] = $bdd_nom_parpaing_vendable->fetchAll() ;
	}
	if ( /*$_SESSION['user_permission'] == 2*/true )
	{
		
	}
?>