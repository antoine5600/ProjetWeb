<!DOCTYPE html>
<html>
<body>
	<?php include ('headerDash.php'); ?>
<?php 
include ('serverDash.php');
include ('server.php');

$id=$_REQUEST['id'];
$result = getUserId($id);
$row = mysqli_fetch_array($result);?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span></button>
			<a class="navbar-brand" onclick="history.go(-1);" style="cursor:pointer;" ><span>Retour</span></a></br>
		</div>
	</div><!-- /.container-fluid -->
</nav>
<p></p>
<nav>
<form method="post" action="userManage.php" class="form-inline contact_box">
	<div class="space">
	<label class="main-label" for="bday">Civilit&eacute; * </label>
	<?php if ($row['User_sex'] == '1' ): ?>
		<input type="hidden" id="civilityhidden" name="customer_title" value="1" />
		<input type="radio" id="title_1" class="active" name="customer_title" value="1" checked />
		<label class="civil" for="title_1">Madame</label>
		<input type="radio" id="title_2" name="customer_title" value="2" />
		<label class="civil" for="title_2">Monsieur</label>
	<?php else : ?>
		<input type="hidden" id="civilityhidden" name="customer_title" value="2" />
		<input type="radio" id="title_1"  name="customer_title" value="1" />
		<label class="civil" for="title_1">Madame</label>
		<input type="radio" id="title_2" class="active" name="*customer_title" value="2" checked/>
		<label class="civil" for="title_2">Monsieur</label>
	<?php endif ?>
	</div>
	<div class="space">
		<label class="main-label" for="bday">Prénom *</label>
		<input type="text" id="colortext" class="form-control input_box" name="userFirstname" value=<?php echo $row['First_name']; ?>>
	</div>
	<div class="space">
		<label class="main-label" for="bday">Nom *</label>
		<input type="text" id="colortext" class="form-control input_box" name="username" value=<?php echo $row['Name']; ?>>
	</div>
	<div class="space">
		<label class="main-label" for="bday">Email *</label>
		<input type="text" id="colortext" class="form-control input_box" name="email" value=<?php echo $row['Mail']; ?>>
	</div>
	<div class="space">
		<label class="main-label" for="bday">Date de naissance *</label>
		<input type="date" id="colortext" class="form-control input_box" id="bday" name="bday" value=<?php echo strftime('%Y-%m-%d', strtotime($row['User_Bday'])); ?> >
  		<input type="hidden" id="id" name="id" value=<?php echo $id; ?> />
  	</div>
	<button type="submit" class="btn btn-default" name="edit_user">Editer</button>
	<p>* Champs obligatoires</p>
</form>
</nav>	
</body>
</html>