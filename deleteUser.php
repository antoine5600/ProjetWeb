<?php 
include ('serverDash.php');
$id=$_REQUEST['id'];


if ($_REQUEST['action']=='deleteUser')    
{
echo "
   <br><center><h5>Souhaitez-vous vraiment supprimer le user n° $id ? 
   <br><br>
   <a href='deleteUser.php?action=validerDeleteUser&amp;id=$id'> Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='userManage.php?'>Non</a></h5></center>";
}
else if ($_REQUEST['action']=='validerDeleteUser')
{
	$a = deleteUser($id);
	echo "<br><br><center><h5>User $id a été supprimé</h5>
   	<a href='userManage.php?'>Retour</a></center>";
}
?>