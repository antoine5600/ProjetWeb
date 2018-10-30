<?php
      // On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
      $page = $_SERVER["REQUEST_URI"];
      $page = str_replace("/projetweb/", "",$page);
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
		</div>
		<div class="profile-usertitle">
			<div class="profile-usertitle-name"><?php echo($_SESSION['username']);?></div>
			<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="divider"></div>
	<ul class="nav menu">
		<li <?php if($page == "myaccount.php"){echo 'class="active"';} ?>><a href="myaccount.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		<li <?php if($page == "userManage.php"){echo 'class="active"';} ?>><a href="userManage.php"><em class="fa fa-calendar">&nbsp;</em> Gestion Utilisateur</a></li>
		<li <?php if($page == "productManage.php"){echo 'class="active"';} ?>><a href="productManage.php"><em class="fa fa-bar-chart">&nbsp;</em> Gestion Produit</a></li>
		<li <?php if($page == "elements.html"){echo 'class="active"';} ?>><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> Gestion Commande</a></li>
		<li <?php if($page == "panels.html"){echo 'class="active"';} ?>><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
		<li <?php if($page == "#"){echo 'class="active"';} ?>class="parent "><a data-toggle="collapse" href="#sub-item-1">
			<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
		</a>
		<ul class="children collapse" id="sub-item-1">
			<li><a class="" href="#">
				<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
			</a></li>
			<li><a class="" href="#">
				<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
			</a></li>
			<li><a class="" href="#">
				<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
			</a></li>
		</ul>
	</li>
	<li <?php if($page == "login.html"){echo 'class="active"';} ?>><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
	</ul>
</div><!--/.sidebar-->