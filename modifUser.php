<?php 
include ('serverDash.php');
include ('server.php');
$id=$_REQUEST['id'];
$result = getUserId($id);
$row = mysqli_fetch_array($result);?>


<form method="post" action="userManage.php" class="form-inline contact_box">
	<label class="main-label" for="bday">Civilit&eacute; * </label><br />
	<?php if ($row['User_sex'] == '1' ): ?>
		<input type="hidden" id="civilityhidden" name="customer_title" value="1" />
		<input type="radio" id="title_1" class="active" name="customer_title" value="1" checked />
		<label class="civil" for="title_1">Madame</label>
		<input type="radio" id="title_2" name="customer_title" value="2" />
		<label class="civil" for="title_2">Monsieur</label><br />
	<?php else : ?>
		<input type="hidden" id="civilityhidden" name="customer_title" value="2" />
		<input type="radio" id="title_1"  name="customer_title" value="1" />
		<label class="civil" for="title_1">Madame</label>
		<input type="radio" id="title_2" class="active" name="*customer_title" value="2" checked/>
		<label class="civil" for="title_2">Monsieur</label><br />
	<?php endif ?>
	<label class="main-label" for="bday">Prénom *</label>
	<input type="text" id="colortext" class="form-control input_box" name="userFirstname" value=<?php echo $row['First_name']; ?>  >
	<label class="main-label" for="bday">Nom *</label>
	<input type="text" id="colortext" class="form-control input_box" name="username" value=<?php echo $row['Name']; ?>>
	<label class="main-label" for="bday">Email *</label>
	<input type="text" id="colortext" class="form-control input_box" name="email" value=<?php echo $row['Mail']; ?>>
	<label class="main-label" for="bday">Date de naissance *</label>
	<input type="date" id="colortext" class="form-control input_box" id="bday" name="bday" value=<?php echo strftime('%Y-%m-%d',
  strtotime($row['User_Bday'])); ?> >
  <input type="hidden" id="id" name="id" value=<?php echo $id; ?> />
	<button type="submit" class="btn btn-default" name="edit_user">Editer</button>
	<p>* Champs obligatoires</p>
</form>
?>