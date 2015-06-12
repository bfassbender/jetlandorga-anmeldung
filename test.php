
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
		<link href="xcms/views/css/test/app.css" rel="stylesheet" type="text/css">
		
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
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="xcms/views/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- <script src="xcms/views/js/validator.min.js" type="text/javascript"></script> -->
		<script src="xcms/views/js/app.js" type="text/javascript"></script>
	</head>
	<body>
<?php
	$scRest = ($config[0]['sc_anz']-$c['sc']);
	$scBan = ($scRest <= '0') ? true : false;
	$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
	$nscBan = ($nscRest <= '0') ? true : false;
?>
				
		<script type="text/javascript">					
			function toggle() {

				if($('#nsc_1').is(':checked')){
					$('#boxnsc').show('fast');
					$('#boxsc').hide('fast');
					$('#bar_art').html(' NSC');
				} else if($('#sc').is(':checked')){
					$('#boxsc').show('fast');
					$('#boxnsc').hide('fast');
			<?php if($scBan == true): ?>
					$('#bar_art').html(' Spieler auf Warteliste');
			<?php else: ?>
					$('#bar_art').html(' Spieler');
			<?php endif; ?>
				}
				
				if($('#agb').is(':checked')){
					$('#submit').removeAttr('disabled');
					$('#submit').css({
						'background-color' : 'green', 
						'border' : '1px solid lightgreen',
						'font-weight' : 'bold',
						'color' : 'white'
					});
				} else {
					$('#submit').attr('disabled', true);
					$('#submit').css({
						'background-color' : 'red',
						'border' : '1px solid white'				
					});
				}
			}
		</script>
		
		
		<div class="container">
			<h1>Onlineanmeldung</h1>		
<?php if($scBan == true): ?>
			<div class='anmeldestatus'>Es stehen derzeit keine Spielerpl&auml;tze mehr zur Verf&uuml;gung, jegliche Spieleranmeldung landet erstmal auf einer <b>Warteliste</b>!</div>
<?php endif; ?>		

			<form class="form-horizontal" role="form" action='<? echo $_SERVER['PHP_SELF']?>?action=anmelden' method='POST' enctype='multipart/form-data' name="anmeldung"  onsubmit="return checkSubmitForm();">
<?php if($scBan == true): ?>
				<input type='hidden' name='member[warteliste]' value='1' />
<?php endif; ?>

			

<!-- Angaben zur Person -->
				<div class="form-group">
					<div class="col-md-12">
						<h2>Angaben zur Person</h2>
					</div>
					<label for="vorname" class="col-md-2 control-label">Vorname<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input  id="vorname" type="text" class="form-control" placeholder="Vorname" name='member[vorname]' value='' maxlength='50' onkeypress="return noreturn(event);" required />
					</div>
					<label for="nachname" class="col-md-2 control-label">Nachname<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input type="text" class="form-control" id="nachname" placeholder="Nachname" name='member[nachname]' value='' maxlength='50' onkeypress="return noreturn(event);">
					</div>
				</div>
				<div class="form-group">
					<label for="strasse" class="col-md-2 control-label">Strasse<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input type="text" class="form-control" id="strasse" placeholder="Strasse" name='member[strasse]' value='' maxlength='50' onkeypress="return noreturn(event);">
					</div>
				</div>
				<div class="form-group">
					<label for="plz" class="col-md-2 control-label">Postleitzahl<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input type="text" class="form-control" id="plz" placeholder="PLZ" name='member[plz]' value='' maxlength='5' onkeypress="return noreturn(event);">
					</div>
					<label for="ort" class="col-md-2 control-label">Ort<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input type="text" class="form-control" id="ort" placeholder="Ort" name='member[ort]' value='' maxlength='50' onkeypress="return noreturn(event);">
					</div>
				</div>
				<div class="form-group">
					<label for="geb_datum" class="col-md-2 control-label">Geburtsdatum<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input type="text" class="form-control" id="geb_datum" placeholder="Geburtsdatum" name='member[geb_datum]' value='' maxlength='10' onkeypress="return noreturn(event);">
					</div>
				</div>
				<div class="form-group">
					<label for="telefon" class="col-md-2 control-label">Telefon<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input type="text" class="form-control" id="telefon" placeholder="Telefon" name='member[telefon]' value='' maxlength='50' onkeypress="return noreturn(event);">
					</div>
					<label for="email" class="col-md-2 control-label">E-Mail<span style='color: red'>*</span></label>
					<div class="col-md-4">
						<input type="text" class="form-control" id="email" placeholder="E-Mail" name='member[email]' value='' maxlength='50' onkeypress="return noreturn(event);">
					</div>
				</div>
<!-- Allgemeine Angaben -->
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
					<label class="col-md-2 control-label">Larperfahrung</label>
					<div class="col-md-10">
						<div class="radio">
					    	<label><input type='radio' name='member[erfahrung]' checked="checked" value='0'>Nein</label>
						</div>
						<div class="radio">
					    	<label><input type='radio' name='member[erfahrung]' value='1'>Ja</label>
						</div>
						<input id='erfahrung_tage' class="form-control" type='text' name='member[erfahrung_tage]' placeholder="Con-Tage gesamt" maxlength="4" value='' />
					</div>
				</div>
				<div class="form-group">			
					<label class="col-md-2 control-label">Sanitäter</label>
					<div class="col-md-10">
						<div class="radio">
							<label><input type='radio' name='member[sanitaeter]' checked="checked" value='0'>Nein</label>
						</div>
						<div class="radio">
							<label><input type='radio' name='member[sanitaeter]' value='1'>Ja</label>
						</div>										
					</div>
				</div>
				<div class="form-group">			
					<label class="col-md-2 control-label">Vegetarier</label>
					<div class="col-md-10">
						<div class="radio">
							<label><input type='radio' name='member[vegetarier]' checked="checked" value='0'>Nein</label>
						</div>
						<div class="radio">
							<label><input type='radio' name='member[vegetarier]' value='1'>Ja</label>
						</div>
					</div>
				</div>
				<div class="form-group">			
					<label class="col-md-2 control-label">Krankheiten / Allergien</label>
					<div class="col-md-10">
						<div class="radio">
							<label><input type='radio' name='member[krankheiten]' checked="checked" value='0'>Nein</label>
						</div>
						<div class="radio">
							<label><input type='radio' name='member[krankheiten]' value='1'>Ja, und zwar</label><br />
						</div>
						<input class="form-control" type='text' name='member[krankheiten_welche]' value='' placeholder='Krankheiten / Allergien' maxlength='100'>
					</div>
				</div>
				<div class="form-group">			
					<label class="col-md-2 control-label">Ich muss durchschlafen</label>
					<div class="col-md-10">
						<div class="radio">
							<label><input type='radio' name='member[durchschlafen]' checked="checked" value='0'>Nein</label>
						</div>
						<div class="radio">
							<label><input type='radio' name='member[durchschlafen]' value='1'>Ja</label>
							<span class="small">(Bitte nur w&auml;hlen, wenn medizinische Gr&uuml;nde vorliegen)</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="zimmer" class="col-md-2 control-label">Ich m&ouml;chte mit folgenden Leuten in ein Zimmer:</label>
					<div class="col-md-10">
						<input class="form-control" type='text' id='zimmer' name='member[zimmer]' placeholder="Zimmergenossen" maxlength='100' value=''> 		
					</div>
				</div>
				
<!-- SC / NSC -->
				<div class="form-group">
					<div class="col-md-12">
						<h2>Teilnehmerart</h2>
					</div>
					<label class="col-md-2 control-label">Ich komme als:</label>
					<div class="col-md-10">
						<div class="radio">
							<label><input type='radio' name='member[rang]' value='sc' id="sc" checked="checked" onclick="toggle()">
							<?php if($scBan == true): ?>Spieler auf Warteliste<?php else: ?>Spieler<?php endif; ?></label>
						</div>
						<div class="radio">
							<label><input type='radio' name='member[rang]' value='nsc|huette' id="nsc_1" onclick="toggle()">NSC</label>
						</div>
					</div>
				</div>
				<!-- SC Angaben -->
				<div id="boxsc">
					<div class="form-group">
						<div class="col-md-12">
							<h3>Angaben zum Charakter</h3>
						</div>
						<label for="charname" class="col-md-2 control-label">Charaktername</label>
						<div class="col-md-10">
							<input id='charname' name='sc[charname]' placeholder='Charaktername' value='' maxlength='50' type='text' class='form-control' />
						</div>					
					</div>
					<div class="form-group">
						<label for="rasse" class="col-md-2 control-label">Rasse</label>
						<div class="col-md-10">
							<input id="rasse" name='sc[rasse]' placeholder='Rasse' value='' maxlength='50' type='text' class='form-control' />
						</div>
					</div>
					<div class="form-group">
						<label for="klasse" class="col-md-2 control-label">Klasse</label>
						<div class="col-md-10">
							<input id="klasse" name='sc[klasse]' placeholder="Klasse" value='' maxlength='50' type='text' class='form-control' />
						</div>
					</div>
					<div class="form-group">
						<label for="herkunft" class="col-md-2 control-label">Herkunft (Land)</label>
						<div class="col-md-10">
							<input id="herkunft" name='sc[herkunft]' placeholder="Herkunft (Land)" value='' maxlength='50' type='text' class='form-control' />
						</div>
					</div>
					<div class="form-group">
						<label for="charname" class="col-md-2 control-label">Charaktername</label>
						<div class="col-md-10">
							<input id="charname" name='sc[charname]' placeholder="Charaktername" value='' maxlength='50' type='text' class='form-control' />
						</div>
					</div>
					<div class="form-group">			
						<label class="col-md-2 control-label">Zauberkundig</label>
						<div class="col-md-10">
							<div class="radio">
							   <label><input type='radio' name='sc[zauber][]' value="0" checked="checked">Nein</label>
							</div>
							<div class="radio">
								<label><input type='radio' name='sc[zauber][]' value="1">Ja</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="contage" class="col-md-2 control-label">Con-Tage des Charakters</label>
						<div class="col-md-10">
							<input id="contage" name='sc[contage]' placeholder="Con-Tage" value='' maxlength='3' type='text' class='form-control' />
						</div>
					</div>
				</div>
					
					
<!-- NSC Angaben -->
				<div id="boxnsc" style="display:none">
					<div class="form-group">
						<div class="col-md-12">
							<h3>Angaben für NSC</h3>
						</div>
						<label class="col-md-2 control-label">Vorlieben:</label>
						<div class="col-md-2">
							<div class="checkbox">
								<label><input type='checkbox' name='nsc[festrolle_plot]' value="1">Festrolle (plotrelevant)</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="checkbox">
								<label><input type='checkbox' name='nsc[festrolle_ambiente]' value="1">Festrolle (Ambiente)</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="checkbox">
								<label><input type='checkbox' name='nsc[springer]' value="1">Springer</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="checkbox">
								<label><input type='checkbox' name='nsc[traeume]' value="1">Tr&auml;ume</label>
							</div>
						</div>
					</div>
					<div class="form-group">			
						<label class="col-md-2 control-label">Ich kann schminken:</label>
						<div class="col-md-10">
							<div class="radio">
								<label><input type='radio' name='nsc[schminken]' value="0" checked="checked">Nein</label>
							</div>
							<div class="radio">
								<label><input type='radio' name='nsc[schminken]' value="1">Ja</label>
							</div>
						</div>
					</div>
					<div class="form-group">			
						<label class="col-md-2 control-label">Ich k&auml;mpfe:</label>
						<div class="col-md-10">
							<div class="radio">
								<label><input type='radio' name='nsc[kaempfen]' value="0" checked="checked">Ungern</label>
							</div>
							<div class="radio">
								<label><input type='radio' name='nsc[kaempfen]' value="1">Gerne</label>
							</div>
						</div>
					</div>
					<div class="form-group">			
						<label class="col-md-2 control-label">Ich zaubere:</label>
						<div class="col-md-10">
							<div class="radio">
								<label><input type='radio' name='nsc[zaubern]' value="0" checked="checked">Ungern</label>
							</div>
							<div class="radio">
								<label><input type='radio' name='nsc[zaubern]' value="1">Gerne</label>
							</div>
						</div>
					</div>
				</div>


<!-- Sonstiges -->				
				<div class="form-group">
					<div class="col-md-12">
						<h2>Sonstiges</h2>
					</div>
					<label for="bemerkung" class="col-md-2 control-label">Bemerkungen</label>
					<div class="col-md-10">
						<div><textarea id="bemerkung" maxlength="500" class="form-control" rows='5' name='member[bemerkung]'><? echo $_SESSION['c5']['member']['bemerkung']?></textarea></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2"></div>
					<div class="col-md-10">
						<div class="checkbox">
							<label><input type='checkbox' name='member[sichtbar]' value='1'>Mein Name auf der HP&nbsp;<img src='xcms/views/images/icons/help.png' onmouseover="Tip('Dein Name erscheint in der<br> Teilnehmerliste auf der Homepage')" onmouseout="UnTip()"></label>
						</div>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-10">
						<div class="checkbox">
							<label><input type='checkbox' name='agb' value='true' id='agb' onclick='toggle()'>Ich habe die <a href='?action=agb' target='blank'>AGB</a> gelesen und akzeptiert.</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2"></div>
					<div class="col-md-10">
						<input type='submit' value=' Anmelden ' disabled="disabled" id='submit'>
					</div>
				</div>
			</form>
		</div>
					


	</body>
</html>
