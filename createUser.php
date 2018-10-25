<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <?php include ('headerDash.php'); ?>
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

<?php include('server.php') ?>
<form method="post" action="userManage.php" class="form-inline contact_box">
    <?php include('errors_reg.php'); ?>
    <label class="main-label" for="bday">Civilit&eacute; * </label>
    <div class="sapce">
        <input type="hidden" id="civilityhidden" name="customer_title" value="1" />
        <input type="radio" id="title_1" class="active" name="customer_title" value="1" checked />
        <label class="civil" for="title_1">Madame</label>
        <input type="radio" id="title_2" name="customer_title" value="2" />
        <label class="civil space" for="title_2">Monsieur</label>
    </div>
    <div class="space">
        <label class="main-label" for="bday">Prénom *</label>
        <input type="text" id="colortext" class="form-control input_box space" name="userFirstname" >
    </div>
    <div class="space">
        <label class="main-label" for="bday">Nom *</label>
        <input type="text" id="colortext" class="form-control input_box space" name="username">
    </div>
    <div class="space">
        <label class="main-label" for="bday">Email *</label>
        <input type="text" id="colortext" class="form-control input_box sapce" name="email">
    </div>
    <div class="space">
        <label class="main-label" for="bday">Date de naissance *</label>
        <input type="date" id="colortext" class="form-control input_box sapce" id="bday" name="bday">
    </div>
    <div class="space">
        <label class="main-label" for="bday">Mot de passe *</label>
        <input type="password" id="colortext" class="form-control input_box sapce" name="password_1">
    </div>
    <div class="space">
        <label class="main-label" for="bday">Confirmation Mot de passe *</label>
        <input type="password" id="colortext" class="form-control input_box sapce" type="password" name="password_2">
    </div>
    <button type="submit" class="btn btn-default" name="create_user">Ajouter</button>
    <p>* Champs obligatoires</p>
</form>

</body>
</html>