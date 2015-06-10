<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Jetland 11 - Der Namenlose Con | Jetland Orga</title>

		<meta charset="utf-8">
		<!-- Stylesheets -->
		<link href="xcms/views/css/jetland/bootstrap.min.css" rel="stylesheet">
		<link href="xcms/views/css/jetland/font-awesome.min.css" rel="stylesheet">
		<link href="xcms/views/css/jetland/font-lato.css" rel="stylesheet">		
		<link href="xcms/views/css/jetland/app.css" rel="stylesheet">


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="xcms/views/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="xcms/views/js/bootstrap.min.js"></script>
		<script src="xcms/views/js/jquery.backstretch.min.js"></script>
		<script src="xcms/views/js/app.js"></script>
	</head>
	<body>
		<!-- Main -->
		<section class="main" id="home">
			<div class="page">
				<div class="wrapper">
					<div class="container" id="container">
						<?php echo $content;?>
					</div>
					<div id='footer'>
						<?php $this->element(ELEMENTS.DS.'footer.elm.php')?>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>

