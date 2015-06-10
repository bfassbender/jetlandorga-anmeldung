<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="de">
	<head>
		<title>
			Jetland 11 - Der Namenlose Con | Jetland Orga
		</title>
		<meta charset="utf-8">
		<!-- Stylesheets -->
		<link href="xcms/views/css/jetland/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="xcms/views/css/jetland/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="xcms/views/css/jetland/font-lato.css" rel="stylesheet" type="text/css">
		<link href="xcms/views/css/test/app.css" rel="stylesheet" type="text/css">
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="xcms/views/js/jquery.min.js" type="text/javascript"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="xcms/views/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- <script src="xcms/views/js/validator.min.js" type="text/javascript"></script> -->
		<script src="xcms/views/js/app.js" type="text/javascript"></script>
	</head>
	<body>
					<div class="container-fluid">
						<h1>Onlineanmeldung</h1>		
<?php if($scBan == true): ?>
						<div class='anmeldestatus'>Es stehen derzeit keine Spielerpl&auml;tze mehr zur Verf&uuml;gung, jegliche Spieleranmeldung landet erstmal auf einer <b>Warteliste</b>!</div>
<?php endif; ?>		

						<form class="form-horizontal" role="form" action='<? echo $_SERVER['PHP_SELF']?>?action=anmelden' method='POST' enctype='multipart/form-data' name="anmeldung"  onsubmit="return checkSubmitForm();">
<?php if($scBan == true): ?>
							<input type='hidden' name='member[warteliste]' value='1' />
<?php endif; ?>

						


							<div class="form-group">
								<div class="col-md-12">
									<h2>Angaben zur Person</h2>
								</div>
								<label for="vorname" class="col-md-2 control-label">Vorname<span style='color: red'>*</span></label>
								<div class="col-md-10">
									<input  id="vorname" type="text" class="form-control" placeholder="Vorname" name='member[vorname]' value='' size='30' onkeypress="return noreturn(event);" required>
								</div>
							</div>
							<div class="form-group">
								<label for="nachname" class="col-md-2 control-label">Nachname<span style='color: red'>*</span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="nachname" placeholder="Nachname" name='member[nachname]' value='' size='30' onkeypress="return noreturn(event);">
								</div>
							</div>
							<div class="form-group">
								<label for="strasse" class="col-md-2 control-label">Strasse<span style='color: red'>*</span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="strasse" placeholder="Strasse" name='member[strasse]' value='' size='30' onkeypress="return noreturn(event);">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<h2>Allgemeine Angaben</h2>
								</div>
								<label class="col-md-2 control-label">Ich helfe beim:</label>
								<div class="col-md-10">
									
									<div class="checkbox">
										<label><input type="checkbox">Aufbau</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox">Aubbau</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<h2>Sonstiges</h2>
								</div>
								<label for="bemerkung" class="col-md-2 control-label">Bemerkungen</label>
								<div class="col-md-10">
									<div><textarea id="bemerkung" class="form-control" rows='5' name='member[bemerkung]'><? echo $_SESSION['c5']['member']['bemerkung']?></textarea></div>
								</div>
							</div>				
						</form>
					</div>
	</body>
</html>
