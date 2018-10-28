<!DOCTYPE html>
<html>
<head>
	<link href="css/styleD.css" rel="stylesheet">
</head>
<body>
<div id="oModal" class="oModal">
  <div>
   
     <section>
      <?php 
			include ('serverDash.php');
			$id=$_REQUEST['id'];


			if ($_REQUEST['action']=='deleteUser')    
			{
			echo "
			   <br><center><h2>Souhaitez-vous vraiment supprimer le user n° $id ? </h2>
			   <br><br>
			   <h4><a href='deleteUser?action=validerDeleteUser&amp;id=$id'#oModal> Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
			   <a href='userManage.php'>Non</a></h4></center>";
			}
			else if ($_REQUEST['action']=='validerDeleteUser')
			{
				$a = deleteUser($id);
			   	header('Location: userManage.php');
			}
		?>
     </section>
  </div>
</div>
</body>
</html>