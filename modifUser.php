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

<div id="oModal" class="oModal">
  <div>
	<form method="post" action="userManage.php" class="form-inline contact_box">
		<div class="separate">
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
		<div class="separate">
			<label class="main-label" for="bday">Prénom *</label>
			<input type="text" id="colortext" class="form-control input_box" name="userFirstname" value=<?php echo $row['First_name']; ?>>
		</div>
		<div class="separate">
			<label class="main-label" for="bday">Nom *</label>
			<input type="text" id="colortext" class="form-control input_box" name="username" value=<?php echo $row['Name']; ?>>
		</div>
		<div class="separate">
			<label class="main-label" for="bday">Email *</label>
			<input type="text" id="colortext" class="form-control input_box" name="email" value=<?php echo $row['Mail']; ?>>
		</div>
		<div class="separate">
			<label class="main-label" for="bday">Date de naissance *</label>
			<input type="date" id="colortext" class="form-control input_box" id="bday" name="bday" value=<?php echo strftime('%Y-%m-%d', strtotime($row['User_Bday'])); ?> >
	  		<input type="hidden" id="id" name="id" value=<?php echo $id; ?> />
	  	</div>
	  	<div class="separate">
			<button type="submit" class="btn btn-default" name="edit_user">Editer</button>
			<p>* Champs obligatoires</p>
		</div>
	</form>
	<footer class="cf">
        <a href="userManage.php" class="btn">Fermer</a>
    </footer>
  </div>
</div>
</body>
</html>