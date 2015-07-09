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
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="xcms/views/js/bootstrap.min.js" type="text/javascript"></script>
			<!-- <script src="xcms/views/js/validator.min.js" type="text/javascript"></script> -->
			<script src="xcms/views/js/app.js" type="text/javascript"></script>
		</head>	
	<body>
		<div class="container" style="margin:20px;">
			<div class="column span-10">
				<div class="column span-10" style='color: black; font-family:  Helvetica, Arial, sans-serif; font-size: 14px; background-color: lime; border: white 2px solid; height: 50'>
					<center><br/><b><?php echo $_SESSION['msg'];?><?php echo $_SESSION['pacifare']['msg'];?></b><br/><br/></center>
				</div>
				<br>
				<div class="column span-10">
					<?if ($_SESSION['loc'] == false && $_SESSION['back'] == false): ?>
						<center><input type=button value="weiter" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>'"  style="color: black;"</center>
					<?php elseif ($_SESSION['loc'] == 'galerie' && $_SESSION['back'] == true): ?>
							<input type=button value="zur&uuml;ck zur alten Galerie" onclick="history.back(-1)"  style="color: black;">
							<input type=button value="weiter zur neuen Galerie" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>?action=<?php echo $_SESSION['loc']?>&id=<?php echo $_SESSION['newloc']?>'" style="color: black;">																			
					<?php elseif ($_SESSION['loc'] == false && $_SESSION['back'] == true): ?>
						<center>
							<input type=button value="zur&uuml;ck zum User" onclick="history.back(-1)" style="style="color: black;">
							<input type=button value="weiter zur &Uuml;bersicht" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>'"  style="color: black;">
						</center>				
					<?php else: ?>
						<div class="form-group">
							<center><input type=button value="weiter" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>?action=<?php echo $_SESSION['loc']?>'" style="color: black;"></center>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</body>
</html>



