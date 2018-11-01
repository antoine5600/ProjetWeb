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
	if ( /*isset( $_SESSION['nb_parpaing'] ) == false*/true ) // marche pas comme prévu, snif
	{
		$bdd_nb_parpaing_vendable = $bdd->query('SELECT COUNT(*) AS nb_parpaing FROM products') ;
		$nb_parpaing_vendable = $bdd_nb_parpaing_vendable->fetch() ;
		$_SESSION['nb_parpaing'] = $nb_parpaing_vendable['nb_parpaing'] ;
		
		$bdd_nom_parpaing_vendable = $bdd->query('SELECT id_prod , name , description , price FROM products') ;
		$_SESSION['nom_parpaing'] = $bdd_nom_parpaing_vendable->fetchAll() ;
	}
	
	if ( isset( $_SESSION['username'] ) )
	{
		$bdd_nb_adresses_client = $bdd->query('SELECT COUNT(*) AS nb_adresses FROM client_addr') ;
		$nb_adresses_client = $bdd_nb_adresses_client->fetch() ;
		$nb_adr_client = $nb_adresses_client['nb_adresses'] ;
		
		if ( $nb_adr_client != 0 )
		{
			$bdd_adresses_client = $bdd->prepare('SELECT * FROM client_addr INER JOIN addresses ON Address = id_addr WHERE Client = :id_client') ;
			$bdd_adresses_client->execute(array(
				'id_client' => $_SESSION['id_user']
				));
			$adr_client = $bdd_adresses_client->fetchAll() ;
			$bdd_adresses_client->closeCursor() ;
		}
		
		$bdd_nb_commandes_client = $bdd->prepare('SELECT COUNT(*) AS nb_commandes FROM command WHERE Client = :id_client') ;
		$bdd_nb_commandes_client->execute(array( 'id_client' => $_SESSION['id_user'] )) ;
		$nb_commandes_client = $bdd_nb_commandes_client->fetch() ;
		$nb_commandes = $nb_commandes_client['nb_commandes'] ;
		
		if ( $nb_commandes != 0 )
		{
			$bdd_adresses_commandes = $bdd->prepare('SELECT * FROM addresses INER JOIN command ON id_addr = command.Delivery_addr JOIN client_addr ON command.Delivery_addr = client_addr.Address WHERE command.Client = :id_client') ;
			$bdd_adresses_commandes->execute(array( 'id_client' => $_SESSION['id_user'] )) ;
			$adresses_commandes = $bdd_adresses_commandes->fetchAll() ;
		}
	}
	
	if ( isset( $_POST['validation_commande'] ) == true )
	{
		if ( $id_post > 0 ) // cas adresse qui existe déjà
		{
			/*$tmp = (int)($id_post) ;
			$bdd_id_adresse_convertion_get = $bdd->prepare('(SELECT Address FROM client_addr LIMIT :id_recu) ORDER BY DESC') ;
			$bdd_id_adresse_convertion = $bdd_id_adresse_convertion_get->execute(array( 'id_recu' => $tmp )) ;*/ // le limit ne marche pas O_o
			$bdd_id_adresse_convertion = $bdd->query('SELECT Address FROM client_addr') ;
			for ( $i = 0 ; $i < $id_post ; $i++ )
			{
				$id_adresse_conversion = $bdd_id_adresse_convertion->fetch() ;
			}
			$req = $bdd->prepare('SELECT AddCommand( :id_adresse_livraison , :id_adresse_achat , :id_client )') ;
			$req->execute(array(
				'id_adresse_livraison' => $id_adresse_conversion['Address'] ,
				'id_adresse_achat' => $id_adresse_conversion['Address'] ,
				'id_client' => $_SESSION['id_user']
				));
			$req->closeCursor() ;
		}
		elseif ( $id_post == -1 ) // cas nouvelle adresse
		{
			// création nouvelle adresse
			$new_rue = $_POST['street'] ;
			$new_additional = $_POST['additional'] ;
			$new_postcode = $_POST['postcode'] ;
			$new_city = $_POST['city'] ;
			$new_country = $_POST['country'] ;
			$req = $bdd->prepare('INSERT INTO addresses( Street , Additional , Postcode , City , Country ) VALUES( :rue , :supplement , :code_postale , :ville , :pays )');
			$req->execute(array(
				'rue' => $new_rue,
				'supplement' => $new_additional,
				'code_postale' => $new_postcode,
				'ville' => $new_city,
				'pays' => $new_country
				));
			$req->closeCursor() ;
			// conexion adresse-client
			$bdd_nb_adresses = $bdd->query('SELECT COUNT(*) AS nb_adresses FROM addresses') ;
			$nb_adresses = $bdd_nb_adresses->fetch() ; // le +1 n'est pas nécessaire car l'adresse est ajouté juste avant
			$new_adr_client = $_POST['addr_name'] ;
			$req = $bdd->prepare('INSERT INTO client_addr( Client , Address , Name ) VALUES( :id_client , :id_adresse , :nom_adresse )');
			$req->execute(array(
				'id_client' => $_SESSION['id_user'],
				'id_adresse' => $nb_adresses['nb_adresses'],
				'nom_adresse' => $new_adr_client
				));
			$req->closeCursor() ;
			//création commande
			$req = $bdd->prepare('SELECT AddCommand( :id_adresse_livraison , :id_adresse_achat , :id_client )') ;
			$req->execute(array(
				'id_adresse_livraison' => $nb_adresses['nb_adresses'] ,
				'id_adresse_achat' => $nb_adresses['nb_adresses'] ,
				'id_client' => $_SESSION['id_user']
				));
			$req->closeCursor() ;
		}
		unset( $_SESSION['id_objet_dans_mon_panier'] ) ;
		$_SESSION['nombre_total_objet_dans_panier'] = 0 ;
	}
	
	
?>