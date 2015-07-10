<!DOCTYPE html>
	<html lang="de">
		<head>
			<meta charset="utf-8">
	      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="Jetland 11 - Die eherne Feste - präsentiert von der Jetland Orga. Ein Fantasy Live Action Roleplay Con vom 13.05. - 16.05.2016">
			<meta name="author" content="Jetland Orga">
			<meta content="yes" name="apple-mobile-web-app-capable">
			<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

			<title>Onlineanmeldung | Jetland 11 - Die eherne Feste | Jetland Orga</title>

			<!-- Stylesheets -->
			<link href="xcms/views/css/jetland/bootstrap.min.css" rel="stylesheet" type="text/css">
			<link href="xcms/views/css/jetland/font-awesome.min.css" rel="stylesheet" type="text/css">
			<link href="xcms/views/css/jetland/font-lato.css" rel="stylesheet" type="text/css">
			<link href="xcms/views/css/jetland/app.css" rel="stylesheet" type="text/css">

			<!-- Favicon -->	
			<link rel="icon" href="/img/favicon/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="/img/favicon/favicon.ico" type="image/x-icon">
			<link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/favicon_57.png">
			<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/img/favicon/favicon_57.png">
			<link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/favicon_72.png">
			<link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/favicon_114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/favicon_120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/favicon_144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/favicon_152.png">
			<meta name="application-name" content="Jetland 11">
			<meta name="msapplication-TileImage" content="/img/favicon/favicon_favicon-144.png">
			<meta name="msapplication-TileColor" content="#666666">


			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="xcms/views/js/jquery.min.js" type="text/javascript"></script>
			<script src="xcms/views/js/jquery.backstretch.min.js" type="text/javascript"></script>
			<script src="xcms/system/libs/js/jquery.tablesorter.js" type="text/javascript"></script>
			<!-- <script src="xcms/views/js/validator.min.js" type="text/javascript"></script> -->
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="xcms/views/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="xcms/views/js/app.js" type="text/javascript"></script>
		</head>	
	<body>
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
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li <?php if (ACTION == 'anmeldungen' || ACTION == 'confirmation'):?>class="active"<?php endif;?>><a href="<? echo $_SERVER['PHP_SELF']?>?action=anmeldungen">Anmeldung <span class="sr-only">(current)</span></a></li>
		        <li <?php if (ACTION == 'teilnehmer'):?>class="active"<?php endif;?>><a href="<? echo $_SERVER['PHP_SELF']?>?action=teilnehmer">Anmeldestatus</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<?php echo $content;?>
		<div id='footer'>
			<?php $this->element(ELEMENTS.DS.'footer.elm.php')?>
		</div>
	</body>
</html>

