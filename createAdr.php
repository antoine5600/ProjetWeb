<!DOCTYPE html>
<html>
<body>
<div id="oModal" class="oModal">
  <div>
    <section>
        <?php include ('header.php'); ?>
        <?php include('server.php') ?>
        <?php include('errors_reg.php'); ?>

        <form method="post" action="account_user.php" class="form-inline contact_box">
            <?php //var_dump($_SESSION); ?>
            <label for="addr_name"><i class="fa fa-user"></i> Nom de l'adresse </label>
            <input type="text" id="addr_name" name="addr_name" placeholder="Chez moi">
            <label for="street"><i class="fa fa-address-card-o"></i> Rue</label>
            <input type="text" id="street" name="street" placeholder="15 Rue Tohannic">
            <label for="additional"><i class="fa fa-address-card-o"></i> Informations Supplémentaires</label>
            <input type="text" id="additional" name="additional" placeholder="3eme étage, porte numéro 307">
            <label for="country">Pays</label>
            <input type="text" id="country" name="country" placeholder="France">
            <div class="row">
                <div class="col-50">
                    <label for="city"><i class="fa fa-institution"></i> Ville </label>
                    <input type="text" id="city" name="city" placeholder="Vannes">
                </div>
                <div class="col-50">
                    <label for="postcode">Code Postal</label>
                    <input type="text" id="postcode" name="postcode" placeholder="56000">
                </div>
            </div>
            <div class="separate">
                <input type="hidden" id="user_id" name ="user_id" value =<?php echo ($_SESSION['id_user']);?>>
                <button type="submit" class="btn btn-default" name="create_adr">Ajouter</button>
                <p>* Champs obligatoires</p>
            </div>
        </form>
        <footer class="cf">
            <a href="account_user.php" class="btn">Fermer</a>
        </footer>
  </div>
</div>
</body>
</html>