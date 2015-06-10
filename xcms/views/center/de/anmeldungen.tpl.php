<?php
$scRest = ($config[0]['sc_anz']-$c['sc']);
$scBan = ($scRest <= '0') ? true : false;
$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
$nscBan = ($nscRest <= '0') ? true : false;
?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#mitfahr').html('<img src="views/images/icons/add.png">');
			$('#mitfahr').mousedown(function(){
				if($('#show_mitfahr').css('display') == 'block'){
					$('#show_mitfahr').hide('fast');
					$('#mitfahr').html('<img src="views/images/icons/add.png">');
				}
				else {
					$('#show_mitfahr').show('fast'); 
					$('#mitfahr').html('<img src="views/images/icons/minus.png">');
				}
			});
		});

		function more(){
			var parent = document.getElementById("more");
			var div = document.createElement("div");
			var in1=document.createElement("input");
				in1.type= "file";
				in1.value= "";
				in1.name = "sc[file][]";
				in1.size = "30";
		
			div.appendChild(in1);
			parent.appendChild(div);
		}
	
		function less(art){

			var parent = document.getElementById("more");
			var link = parent.lastChild;
			parent.removeChild(link);
		}

		function toggle() {
		
			if($('#nsc_1').is(':checked') || $('#nsc_2').is(':checked')){
				$('#boxnsc').show('fast');
				$('#boxsc').hide('fast');
				if($('#nsc_1').is(':checked')) {
					$('#bar_art').html(' NSC Huette');
				}
				$('#bar_art').css('font-weight', 'bold');
			} else if($('#sc').is(':checked')){
				$('#boxsc').show('fast');
				$('#boxnsc').hide('fast');
		<?php if($scBan == true): ?>
				$('#bar_art').html(' Spieler auf Warteliste');
		<?php else: ?>
				$('#bar_art').html(' Spieler');
		<?php endif; ?>
				$('#bar_art').css('font-weight', 'bold');			
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

	  	function noreturn(e) {
	  		return e.keyCode==13? false:true;
		}

		function checkSubmitForm(){
			var error = false;
			var error_message = "Bitte korrigieren Sie Ihre Eingaben:\n\n";
	
			if($('#vorname').val() == ''){
				error = true;
	  			error_message += "- Es wurde kein Vorname eingetragen.\n";
			}
			if($('#nachname').val() == ''){
				error = true;
	  			error_message += "- Es wurde kein Nachname eingetragen.\n";
			}
			if($('#strasse').val() == ''){
				error = true;
	  			error_message += "- Es wurde keine Strasse eingetragen.\n";
			}
			if($('#plz').val() == ''){
				error = true;
	  			error_message += "- Es wurde keine Postleitzahl eingetragen.\n";
			}
			if($('#ort').val() == ''){
				error = true;
	  			error_message += "- Es wurde kein Ort eingetragen.\n";
			}
			if($('#geb_datum').val() == ''){
				error = true;
	  			error_message += "- Es wurde kein Geburtsdatum eingetragen.\n";
			}
			if($('#email').val() == ''){
				error = true;
	  			error_message += "- Es wurde keine oder eine ungueltige Email eingetragen.\n";
			}						
	 		if (error) {
				error_message += "";
				alert(error_message);
				return false; //Formular wird nicht abgeschickt.
			} else {
				//document.regform.submit();
				return true;  //Formular wird abgeschickt.
			}
		}
	</script>





<?php if($scBan == true): ?>
	<div class='anmeldestatus'>
		Es stehen derzeit keine Spielerpl&auml;tze mehr zur Verf&uuml;gung, jegliche Spieleranmeldung landet erstmal auf einer <b>Warteliste</b>!
	</div>
<?php endif; ?>
	<div class='anmeldung'>
		<h3>Angaben zum Spieler</h3>
			<form class="form-horizontal" action='<? echo $_SERVER['PHP_SELF']?>?action=anmelden' method='POST' enctype='multipart/form-data' name="anmeldung"  onsubmit="return checkSubmitForm();">
<?php if($scBan == true): ?>
				<input type='hidden' name='member[warteliste]' value='1' />
<?php endif; ?>		
			<div class="form-group">
				<label class="col-sm-3 control-label" for="vorname">Vorname<span style='color: red'>*</span></label>
				<div class="col-sm-9">
					<input id='vorname' type='text' name='member[vorname]' value='' maxlength='10' onkeypress="return noreturn(event);" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="nachname">Nachname<span style='color: red'>*</span></label>
				<div class="col-sm-9">
					<input id='nachname' type='text' name='member[nachname]' value='' size='30' onkeypress="return noreturn(event);"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="strasse">Strasse<span style='color: red'>*</span></label>
				<div class="col-sm-9">
					<input id='strasse' type='text' name='member[strasse]' value='' size='30' onkeypress="return noreturn(event);"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="plz">Postleitzahl<span style='color: red'>*</span></label>
				<div class="col-sm-9">
					<input id='plz' type='text' name='member[plz]' value='' size='5' maxlength='5' onkeypress="return noreturn(event);"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="ort">Ort<span style='color: red'>*</span></label>
				<div class="col-sm-9">
					<input id='ort' type='text' name='member[ort]' value='<? echo $_SESSION['c5']['member']['ort']?>' size='30' onkeypress="return noreturn(event);"/>
				</div>
			</div>			
			<div class="form-group">
				<label class="col-sm-3 control-label" for="ort">Telefon</label>
				<div class="col-sm-9">
					<input id='telefon' type='text' name='member[telefon]' value='<? echo $_SESSION['c5']['member']['telefon']?>' size='30' onkeypress="return noreturn(event);"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="geb_datum">Geburtsdatum<span style='color: red'>*</span></label>
				<div class="col-sm-9">
					<input id='geb_datum' type='text' name='member[geb_datum]' value='<? echo $_SESSION['c5']['member']['geb_datum']?>' size='10' maxlength='10' onkeypress="return noreturn(event);" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="email">E-Mail<span style='color: red'>*</span></label>
				<div class="col-sm-9">
					<input id='email' type='text' name='member[email]' value='<? echo $_SESSION['c5']['member']['email']?>' size='30' onkeypress="return noreturn(event);">
				</div>
			</div>
			<div class="form-group">
				<h3>Allgemeine Angaben</h3>
				<label class="col-sm-3 control-label">Ich helfe beim:</label>
				<div class="col-sm-9 checkbox">
				    <label>
						<input type='checkbox' name='member[aufbau]' value='1' class='radio'>Aufbau
					</label><br />
				    <label>
						<input type='checkbox' name='member[abbau]' value='1' class='radio'>Abbau
					</label>				
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Larperfahrung</label>
				<div class="col-sm-9 radio">
				    <label>
						<input type='radio' name='member[erfahrung]' checked="checked" value='0' class='radio'>Nein
					</label><br />
				    <label>
						<input type='radio' name='member[erfahrung]' value='1' class='radio'>Ja &nbsp; (Con-Tage insgesamt)
					</label><br />
				    <label>
						<input type='text' name='member[erfahrung_tage]' value='' />
					</label>
				</div>
			</div>			
			<div class="form-group">			
				<label class="col-sm-3 control-label">Sanitäter</label>
				<div class="col-sm-9 radio">
					<label>
						<input type='radio' name='member[sanitaeter]' checked="checked" value='0' class='radio'> Nein &nbsp;
					</label><br />
					<label>
						<input type='radio' name='member[sanitaeter]' value='1' class='radio'> Ja
					</label>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-sm-3 control-label">Vegetarier</label>
				<div class="col-sm-9 radio">
					<label>
						<input type='radio' name='member[vegetarier]' checked="checked" value='0' class='radio'> Nein &nbsp;
					</label><br />
					<label>
						<input type='radio' name='member[vegetarier]' value='1' class='radio'> Ja
					</label>
				</div>	
			</div>
			<div class="form-group">			
				<label class="col-sm-3 control-label">Krankheiten / Allergien</label>
				<div class="col-sm-9 radio">
					<label>
						<input type='radio' name='member[krankheiten]' checked="checked" value='0' class='radio'> Nein &nbsp;
					</label><br />
					<label>
						<input type='radio' name='member[krankheiten]' value='1' class='radio'> Ja, &nbsp;
					</label><br />
				    <label>
						<input type='text' name='member[krankheiten_welche]' value='' class='radio'>
					</label>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-sm-3 control-label">Ich muss durchschlafen</label>
				<div class="col-sm-9 radio">
					<label>
						<input type='radio' name='member[durchschlafen]' checked="checked" value='0' class='radio'> Nein &nbsp;
					</label><br />
					<label>					
						<input type='radio' name='member[durchschlafen]' value='1' class='radio'> Ja
					</label><br />
					<span class="small">(Nur Ja ankreuzen, wenn medizinische Gr&uuml;nde vorliegen)</span>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-sm-3 control-label" for="zimmer">Ich m&ouml;chte mit folgenden Leuten in ein Zimmer:</label>
				<div class="col-sm-9">
					<input type='text' id='zimmer' name='member[zimmer]' value=''> 		
				</div>
			</div>
			<h3>Teilnehmerart<span id='bar_art' style='text-weight: bold'><b>&nbsp;Spieler</b></span></h3>
			<div class='header'>
				<b>Ich komme als:</b><span style='color: red'> *</span>
			</div>	
			<div class='userinput'>
				<input type='radio' name='member[rang]' value='sc' id="sc" checked="checked" class='radio' onclick="toggle()"> <b>Spieler</b> &nbsp;
				<input type='radio' name='member[rang]' value='nsc|huette' id="nsc_1" class='radio' onclick="toggle()"> <b>NSC</b>
			</div><br><br>
		<div id="boxsc" style="display:block">
			<div class='header'><b>Spieler</b></div>
			<br />
			<b> Angaben zum Charakter:</b><br /><br />
			<div class='header' style='position: absolute'><b>Charaktername</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='charname' type='text' name='sc[charname]' size='30' onkeypress="return noreturn(event);">
			</div><br>			
			<div class='header' style='position: absolute'><b>Rasse</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='rasse' type='text' name='sc[rasse]' size='30' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Klasse</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='klasse' type='text' name='sc[klasse]' size='30' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Herkunft (Land)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='herkunft' type='text' name='sc[herkunft]' size='30' onkeypress="return noreturn(event);">
			</div><br>	
			<div class='header' style='position: absolute'><b>Zauberkundig</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='radio' name='sc[zauber][]' value="0" checked="checked" size='30' onkeypress="return noreturn(event);"> Nein
				<input type='radio' name='sc[zauber][]' value="1" size='30' onkeypress="return noreturn(event);"> Ja
			</div><br>
			<div class='header' style='position: absolute'><b>Con-Tage<br /> (Charakter)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='contage' type='text' name='sc[contage]' size='30' onkeypress="return noreturn(event);">
			</div><br>														
		</div>
		<div id="boxnsc" style="display:none">
			<div class='header' style='position: absolute'><b>NSC</b></div>
			<br />
			<div class='header' style='position: absolute'><b>Festrolle<br /> (plotrelevant)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[festrolle_plot]' value="1" size='30' onkeypress="return noreturn(event);">
			</div><br>			
			<div class='header' style='position: absolute'><b>Festrolle<br /> (Ambiente)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[festrolle_ambiente]' value="1" size='30' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Springer</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[springer]' value="1" size='30' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Tr&auml;ume</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[traeume]' value="1" size='30' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Ich kann schminken:</b></div>
			<div style='position: relative; padding-left: 180px'>
				<input type='radio' name='nsc[schminken]' value="0" size='30' checked="checked" onkeypress="return noreturn(event);"> Nein
				<input type='radio' name='nsc[schminken]' value="1" size='30' onkeypress="return noreturn(event);"> Ja
			</div><br>
			<div class='header' style='position: absolute'><b>Ich k&auml;mpfe:</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='radio' name='nsc[kaempfen]' value="0" size='30' checked="checked" onkeypress="return noreturn(event);"> Ungern
				<input type='radio' name='nsc[kaempfen]' value="1" size='30' onkeypress="return noreturn(event);"> Gerne
			</div><br>
			<div class='header' style='position: absolute'><b>Ich zaubere:</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='radio' name='nsc[zaubern]' value="0" size='30' checked="checked" onkeypress="return noreturn(event);"> Ungern
				<input type='radio' name='nsc[zaubern]' value="1" size='30' onkeypress="return noreturn(event);"> Gern
			</div><br>
		</div>
		<br />		
		<div class='heading' style='margin-top: 20px'>
				<b>Sonstiges</b><span id='bar_art' style='text-weight: bold'></span>
		</div><br>			
		
			<div class='header' style='position: absolute'>
				<b>Bemerkung</b>
			</div>
			<div>
				<textarea cols='30' rows='5' name='member[bemerkung]'><? echo $_SESSION['c5']['member']['bemerkung']?></textarea>
			</div><br />
			<div>
				<b>Mein Name auf der HP</b>&nbsp;<img src='xcms/views/images/icons/help.png' onmouseover="Tip('Dein Name erscheint in der<br> Teilnehmerliste auf der Homepage')" onmouseout="UnTip()">
				 &nbsp;<input type='checkbox' name='member[sichtbar]' value='1' class='radio' <? if (isset($_SESSION['c5']['member']['sichtbar'])) echo ($_SESSION['c5']['member']['sichtbar'] == '1')? 'checked' : ''; else echo 'checked';?>>
			</div><br><br>
			<div class='header'>
				<b>Ich habe die <a href='?action=agb' target=_blank>AGB</a> gelesen und akzeptiert.</b>
				<input type='checkbox' name='agb' value='true' id='agb' onclick='toggle()' class='radio'>
			</div>
			<br>
			<input type='submit' value=' Anmelden ' disabled="disabled" id='submit'></div>
		</form>
	</div>	
	<div>(Mit <b>*</b> gekennzeichnete Felder sind Pflichtfelder)</span>

