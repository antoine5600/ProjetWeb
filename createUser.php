<?php include('server.php') ?>
<form method="post" action="userManage.php" class="form-inline contact_box">
    <?php include('errors_reg.php'); ?>
    <label class="main-label" for="bday">Civilit&eacute; * </label><br />
        <input type="hidden" id="civilityhidden" name="customer_title" value="1" />
        <input type="radio" id="title_1" class="active" name="customer_title" value="1" checked />
        <label class="civil" for="title_1">Madame</label>
        <input type="radio" id="title_2" name="customer_title" value="2" />
        <label class="civil" for="title_2">Monsieur</label><br />
    <label class="main-label" for="bday">Prénom *</label>
        <input type="text" id="colortext" class="form-control input_box" name="userFirstname"  >
    <label class="main-label" for="bday">Nom *</label>
        <input type="text" id="colortext" class="form-control input_box" name="username">
    <label class="main-label" for="bday">Email *</label>
        <input type="text" id="colortext" class="form-control input_box" name="email">
    <label class="main-label" for="bday">Date de naissance *</label>
        <input type="date" id="colortext" class="form-control input_box" id="bday" name="bday">
    <label class="main-label" for="bday">Mot de passe *</label>
        <input type="password" id="colortext" class="form-control input_box" name="password_1">
    <label class="main-label" for="bday">Confirmation Mot de passe *</label>
        <input type="password" id="colortext" class="form-control input_box" type="password" name="password_2">
    <button type="submit" class="btn btn-default" name="create_user">S'inscrire</button>
    <p>* Champs obligatoires</p>
</form>


<button onclick="history.go(-1);">Back </button>

