	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
         <a class="navbar-brand" href="/index.php">Jetland 11</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
				<li <?php if (ACTION == 'anmeldungen' || ACTION == 'confirmation'):?>class="active"<?php endif;?>><a href="<? echo $_SERVER['PHP_SELF']?>?action=anmeldungen">Anmeldung <span class="sr-only">(current)</span></a></li>
				<li <?php if (ACTION == 'teilnehmer'):?>class="active"<?php endif;?>><a href="<? echo $_SERVER['PHP_SELF']?>?action=teilnehmer">Anmeldestatus</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Downloads <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a target="_blank" href="/files/Flyer_Jetland_11.pdf">Jetland 11 Flyer</a></li>
				      <li><a target="_blank" href="/files/DragonSys_Charakterogen_3rd_Ed.pdf">Charakterbogen (Dragonsys 3rd Ed.)</a></li>
				      <li><a target="_blank" href="/files/Jetland_11_Regelerweiterungen.pdf">Regelerweiterungen</a></li>
			      	<li><a target="_blank" href="/files/Jetland_11_Kraeuterregelwerk.pdf">Kräuterregelwerk</a></li>
				   </ul>
				</li>
				<li><a target="_blank" href="http://forum.dreywassern.de">Forum</a></li>
	<?php if (($_SESSION['xcms']['login']['admin'] == true) || ACTION == 'logmein'): ?>
			<li><a href="<?php echo $_SERVER['PHP_SELF']?>?action=admin">Admin</a></li>
	<?php endif;?>
	<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>
	        <li><a href="<?php echo $_SERVER['PHP_SELF']?>?action=logout">Abmelden</a></li>
	<?php endif;?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>