<?php header('Content-Type: text/html; charset=utf-8');?>
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
		<style>
		/* About */
		/*    background: #e4e4e4;*/
		#confirmation{
			background: rgba(0,0,0,0.7);
		}

		#confirmation h1,
		#confirmation h2,
		#confirmation h3,
		#confirmation h4,
		#confirmation h5,
		#confirmation h6 {
			text-align: center;
		}

		.confirmation-box-container {
			margin: 20px 0;
			text-align: center;
			padding-bottom: 20px;
		}

		.confirmation-box {
			text-align: left;
			background: rgba(255,255,255,0.2);
		}

		.confirmation-box .description {
			padding: 20px 15px 10px;
		}

		.confirmation-box .description p {
			font-size: 16px;
		}

		/* Small devices (tablets, 768px and up) */
		@media (min-width: 768px) { 
			.confirmation-box-container{
				margin: 0;
			}
		}

		</style>
		<?php $this->element(ELEMENTS.DS.'menu.elm.php')?>	
		<!-- About -->
		<section id="confirmation" class="section">
			<div class="container">
				<div class="confirmation-box-container">
					<div class="row">
						<h3 class="text-danger"><?php echo $_SESSION['msg'];?></h3>
					</div>
					<div class="row">
						<form class="form-horizontal" role="form">
							<button type='button' class="btn btn-danger" onClick="window.history.back()">&#x2190; zurück</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>