<?php
	$scRest = ($config[0]['sc_anz']-$c['sc']);
	$scBan = ($scRest <= '0') ? true : false;
	$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
	$nscBan = ($nscRest <= '0') ? true : false;
	$anmeldung_active = false;
?>
				
<script type="text/javascript">		
   $(document).ready(function() {
	   toggle_input('#erfahrung_tage', $("input[name='member[erfahrung]']").val());
	   toggle_input('#krankheiten_welche', $("input[name='member[krankheiten]']").val());
	   toggle();
	
		$("input[name='member[erfahrung]']").click(function(){
			toggle_input('#erfahrung_tage', $(this).val());
		});
		
		$("input[name='member[krankheiten]']").click(function(){
			toggle_input('#krankheiten_welche', $(this).val());
		});
		
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip();
		})
		
   });

   function toggle_input (fieldname, enable) {
			if(enable=='1') {
				$(fieldname).attr("disabled", false);
			} else {
				$(fieldname).attr("disabled", true);
				$(fieldname).val('');
			}
   }

			
	function toggle() {

		if($('#nsc').is(':checked')){
			$('#boxnsc').show('fast');
			$('#boxsc').hide('fast');
			$('#bar_art').html(' NSC ');
			$('#aufbau_checkbox').attr('disabled', false);
		} else if($('#sc').is(':checked')){
			$('#boxsc').show('fast');
			$('#boxnsc').hide('fast');
			$('#aufbau_checkbox').attr('disabled', true);
			$('#aufbau_checkbox').attr("checked", false);
	<?php if($scBan == true): ?>
			$('#bar_art').html(' Spieler auf Warteliste ');
	<?php else: ?>
			$('#bar_art').html(' Spieler ');
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
			$('#submit').val(' Ich melde mich verbindlich und kostenpflichtig an. ');
		} else {
			$('#submit').attr('disabled', true);
			$('#submit').css({
				'background-color' : 'red',
				'border' : '1px solid white'				
			});
			$('#submit').val(' Bitte akzeptiere zuerst die AGB. ');
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
			return true;  //Formular wird abgeschickt.
		}
	}
</script>

<div class="container" id="inline_content">
	<h1>Onlineanmeldung</h1>

	<div class="row">
		<div class="col-md-12">
			<h2>Kurzinfo und Preise</h2>
		</div>
		<div class="col-md-8">
			<h3><b>Jetland 11 - Die Eherne Feste</b></h3>
			<h3>Vom 13. - 16. Mai 2016<br/>
			Jugendburg Neuerburg / Eifel</h3>
		</div>
		<div class="col-md-4 table-background">
			<table id="teilnehmer" class="table table-striped">
				<thead>
					<tr>
						<th>Datum</th>		
						<th>SC</th>
						<th>NSC</th>		
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>bis 01.11.2015</td>
						<td>180 €</td>
						<td>85 €</td>								
					</tr>
					<tr>
						<td>bis 01.02.2016</td>
						<td>190 €</td>
						<td>85 €</td>								
					</tr>
					<tr>
						<td>bis 08.05.2016</td>
						<td>200 €</td>
						<td>95 €</td>								
					</tr>
				</tbody>
			</table>
		</div>
	</div>
<?php if($anmeldung_active == true || $controls['backendmode'] == true): ?>	
	<form class="form-horizontal" role="form" action='<? echo $_SERVER['PHP_SELF']?>?action=anmelden' method='POST' enctype='multipart/form-data' name="anmeldung"  onsubmit="return checkSubmitForm();">
	<?php if($scBan == true): ?>
		<input type='hidden' name='member[warteliste]' value='1' />
	<?php endif; ?>
		<input type='hidden' name='backendmode' value='<?php echo $controls['backendmode']?>' />

<!-- Angaben zur Person -->
		<div class="form-group">
			<div class="col-md-12">
				<h2>Angaben zur Person</h2>
				<span>(Mit <b>*</b> gekennzeichnete Felder sind Pflichtfelder)</span>
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
			<label for="land" class="col-md-2 control-label">Land<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<select id="land" name='member[land]' class="form-control">
					<option value="Deutschland">Deutschland</option>
					<option value="Irland">Irland</option>
					<option value="Österreich">Österreich</option>
					<option value="Schweiz">Schweiz</option>				
					<option value="Vereinigte Staaten von Amerika">Vereinigte Staaten von Amerika</option>
					<option value="Anderes Land, siehe Bemerkungen">Anderes Land, siehe Bemerkungen</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-md-2 control-label">E-Mail<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="email" placeholder="E-Mail" name='member[email]' value='' maxlength='50' onkeypress="return noreturn(event);">
			</div>
			<label for="telefon" class="col-md-2 control-label">Telefon</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="telefon" placeholder="Telefon" name='member[telefon]' value='' maxlength='50' onkeypress="return noreturn(event);">
			</div>
		</div>
<!-- Allgemeine Angaben -->
		<div class="form-group">
			<div class="col-md-12">
				<h2>Allgemeine Angaben</h2>
			</div>
			<label class="col-md-2 control-label">Ich komme als:</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[rang]' value='sc' id="sc" checked="checked" onclick="toggle()">
					<?php if($scBan == true): ?>Spieler auf Warteliste<?php else: ?>Spieler<?php endif; ?></label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[rang]' value='nsc' id="nsc" onclick="toggle()">NSC</label>
				</div>
			</div>

			<label class="col-md-2 control-label">Ich helfe beim:</label>
			<div class="col-md-10">
				<div id="aufbauhelfer" class="checkbox-inline">
					<label><input id="aufbau_checkbox" type="checkbox" name="member[aufbau]" value="1">Aufbau (nur NSC)</label>
				</div>
				<div class="checkbox-inline">
					<label><input type="checkbox" name="member[abbau]" value="1">Abbau</label>
				</div>
			</div>
		</div>							
		<div class="form-group">
			<label class="col-md-2 control-label">Larperfahrung</label>
			<div class="col-md-10">
				<div class="radio-inline">
			    	<label><input type='radio' name='member[erfahrung]' checked="checked" value='0'>Nein</label>
				</div>
				<div class="radio-inline">
			    	<label><input type='radio' name='member[erfahrung]' value='1'>Ja</label>
				</div>
				<input id='erfahrung_tage' class="form-control" type='text' name='member[erfahrung_tage]' placeholder="Con-Tage gesamt" maxlength="4" value='' />
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Sanitäter</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[sanitaeter]' checked="checked" value='0'>Nein</label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[sanitaeter]' value='1'>Ja</label>
				</div>										
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Vegetarier</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[vegetarier]' checked="checked" value='0'>Nein</label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[vegetarier]' value='1'>Ja</label>
				</div>
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Krankheiten / Allergien</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[krankheiten]' checked="checked" value='0'>Nein</label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[krankheiten]' value='1'>Ja, und zwar</label><br />
				</div>
				<input id='krankheiten_welche' class="form-control" type='text' name='member[krankheiten_welche]' value='' placeholder='Krankheiten / Allergien' maxlength='100'>
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Ich muss durchschlafen</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[durchschlafen]' checked="checked" value='0'>Nein</label>
				</div>
				<div class="radio-inline">
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
				<label class="col-md-2 control-label">Zauberkundig</label>
				<div class="col-md-10">
					<div class="radio-inline">
					   <label><input type='radio' name='sc[zauber]' value="0" checked="checked">Nein</label>
					</div>
					<div class="radio-inline">
						<label><input type='radio' name='sc[zauber]' value="1">Ja</label>
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
					<div class="radio-inline">
						<label><input type='radio' name='nsc[schminken]' value="0" checked="checked">Nein</label>
					</div>
					<div class="radio-inline">
						<label><input type='radio' name='nsc[schminken]' value="1">Ja</label>
					</div>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-md-2 control-label">Ich k&auml;mpfe:</label>
				<div class="col-md-10">
					<div class="radio-inline">
						<label><input type='radio' name='nsc[kaempfen]' value="0" checked="checked">Ungern</label>
					</div>
					<div class="radio-inline">
						<label><input type='radio' name='nsc[kaempfen]' value="1">Gerne</label>
					</div>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-md-2 control-label">Ich zaubere:</label>
				<div class="col-md-10">
					<div class="radio-inline">
						<label><input type='radio' name='nsc[zaubern]' value="0" checked="checked">Ungern</label>
					</div>
					<div class="radio-inline">
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
				<div><textarea id="bemerkung" maxlength="500" class="form-control" rows='5' name='member[bemerkung]'></textarea></div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<div class="checkbox">
					<label><input type='checkbox' name='member[sichtbar]' value='1'>Mein Name darf auf der Homepage veröffentlicht werden.&nbsp;</label><img src='xcms/views/images/icons/help.png' data-toggle="tooltip" data-placement="right" title="Dein Name wird im Anmeldestatus auf der Webseite angezeigt."/>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<div class="checkbox">
					<label><input type='checkbox' name='agb' value='true' id='agb' onclick='toggle()'>Ich habe die <a href='/files/AGB_Jetland_11.pdf' target='blank'>AGB</a> gelesen und akzeptiert.</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<label>Hiermit melde ich mich verbindlich und kostenpflichtig für Jetland 11 an.</label><br/>
				<input type='submit' value=' Anmelden ' disabled="disabled" id='submit'>
			</div>
		</div>
	</form>
<?php else: ?>
	<div class="row">
		<h3 class="text-warning table-background" style="margin-top: 10px; padding: 15px;"><b>Leider können wir momentan keine Anmeldungen mehr annehmen, weil mehr Anmeldungen bei uns eingegangen sind, als wir Plätze haben.</h3>
	</div>
<?php endif; ?>
</div>