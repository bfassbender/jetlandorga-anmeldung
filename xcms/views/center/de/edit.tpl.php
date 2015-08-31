<?
$scRest = ($config[0]['sc_anz']-$c['sc']);
$scBan = ($scRest <= '0') ? true : false;
$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
$nscBan = ($nscRest <= '0') ? true : false;
?>

<script type="text/javascript">
	$(document).ready(function(){
		toggleStartup("<?=$data['data'][0]['rang']?>");
	
	   toggle_input('#erfahrung_tage', <?=$data['data'][0]['erfahrung']?>);
	   toggle_input('#krankheiten_welche', <?=$data['data'][0]['krankheiten']?>);
	
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
	
  	function noreturn(e) {
  		return e.keyCode==13? false:true;
	}

   function toggle_input (fieldname, enable) {
			if(enable=='1') {
				$(fieldname).attr("disabled", false);
			} else {
				$(fieldname).attr("disabled", true);
				$(fieldname).val('');
			}
   }



	function toggleStartup (type) {
		if (type == 'sc') {
			$('#boxsc').show('fast');
			$('#boxnsc').hide('fast');
			$('#sc').prop('checked', true);
		<?php if($scBan == true): ?>
			$('#bar_art').html(' Spieler auf Warteliste');
		<?php else: ?>
			$('#bar_art').html(' Spieler');
		<?php endif; ?>
			$('#bar_art').css('font-weight', 'bold');						
		} else {
			$('#boxnsc').show('fast');
			$('#boxsc').hide('fast');
			$('#bar_art').css('font-weight', 'bold');
		}
	}

	function toggle() {
		if($('#nsc').is(':checked')){
			$('#boxnsc').show('fast');
			$('#boxsc').hide('fast');
			$('#bar_art').html(' NSC ');
			$('#bar_art').css('font-weight', 'bold');
		} else if($('#sc').is(':checked')){
			$('#boxsc').show('fast');
			$('#boxnsc').hide('fast');
			$('#bar_art').html(' Spieler ');
			$('#bar_art').css('font-weight', 'bold');			
		}
	}	
</script>

<style>
	input, textarea, select {
		color: black;
	}
</style>




<form class="form-horizontal" role="form" action='<? echo $_SERVER['PHP_SELF']?>?action=editUser' method='POST' enctype='multipart/form-data' name="anmeldung">
	<input type="hidden" name="member[id]" value="<?=$data['data'][0]['id']?>" />
	<span>(Mit <b>*</b> gekennzeichnete Felder sind Pflichtfelder)</span>

<!-- Lösch-Status -->
	<div class="form-group">
		<div class="col-md-12">
			<h2>Gelöscht</h2>
		</div>			
		<label class="col-md-2 control-label">Gelöscht</label>
		<div class="col-md-10">
			<div class="radio-inline">
				<label><input type='radio' name='member[deleted]' value="0" <?php if($data['data'][0]['deleted'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
			</div>
			<div class="radio-inline">
				<label><input type='radio' name='member[deleted]' value="1" <?php if($data['data'][0]['deleted'] != '0'):?> checked="checked" <?php endif; ?>>Ja<?php if ($data['data'][0]['deleted'] == '1'): ?>, am <?=date('d.m.Y', $data['data'][0]['deleted_date']);?><?php endif; ?></label>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-md-12">
			<h2>Warteliste</h2>
		</div>			
		<label class="col-md-2 control-label">Warteliste</label>
		<div class="col-md-10">
			<div class="radio-inline">
				<label><input type='radio' name='member[warteliste]' value="0" <?php if($data['data'][0]['warteliste'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
			</div>
			<div class="radio-inline">
				<label><input type='radio' name='member[warteliste]' value="1" <?php if($data['data'][0]['warteliste'] != '0'):?> checked="checked" <?php endif; ?>>Ja<?php if ($data['data'][0]['deleted'] == '1'): ?>, am <?=date('d.m.Y', $data['data'][0]['deleted_date']);?><?php endif; ?></label>
			</div>
		</div>
		<label for="warteliste_rang" class="col-md-2 control-label">Wartelisten-Rang</label>
		<div class="col-md-4">
			<input type="text" class="form-control" id="warteliste_rang" placeholder="Rang" name='member[warteliste_rang]' value='<?=$data['data'][0]['warteliste_rang']?>' maxlength='4'>
		</div>
	</div>

<!-- Angaben zur Person -->
		<div class="form-group">
			<div class="col-md-12">
				<h2>Angaben zur Person</h2>
			</div>
			<label for="vorname" class="col-md-2 control-label">Vorname<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input  id="vorname" type="text" class="form-control" placeholder="Vorname" name='member[vorname]' value='<?=$data['data'][0]['vorname']?>' maxlength='50' required />
			</div>
			<label for="nachname" class="col-md-2 control-label">Nachname<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="nachname" placeholder="Nachname" name='member[nachname]' value='<?=$data['data'][0]['nachname']?>' maxlength='50'>
			</div>
		</div>
		<div class="form-group">
			<label for="strasse" class="col-md-2 control-label">Strasse<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="strasse" placeholder="Strasse" name='member[strasse]' value='<?=$data['data'][0]['strasse']?>' maxlength='50'>
			</div>
		</div>
		<div class="form-group">
			<label for="plz" class="col-md-2 control-label">Postleitzahl<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="plz" placeholder="PLZ" name='member[plz]' value='<?=$data['data'][0]['plz']?>' maxlength='5'>
			</div>
			<label for="ort" class="col-md-2 control-label">Ort<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="ort" placeholder="Ort" name='member[ort]' value='<?=$data['data'][0]['ort']?>' maxlength='50'>
			</div>
		</div>
		<div class="form-group">
			<label for="geb_datum" class="col-md-2 control-label">Geburtsdatum<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="geb_datum" placeholder="Geburtsdatum" name='member[geb_datum]' value='<?=$data['data'][0]['geb_datum']?>' maxlength='10'>
			</div>
			<label for="land" class="col-md-2 control-label">Land<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="land" placeholder="Land" name='member[land]' value='<?=$data['data'][0]['land']?>' maxlength='10'>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-md-2 control-label">E-Mail<span style='color: red'>*</span></label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="email" placeholder="E-Mail" name='member[email]' value='<?=$data['data'][0]['email']?>' maxlength='50'>
			</div>
			<label for="telefon" class="col-md-2 control-label">Telefon</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="telefon" placeholder="Telefon" name='member[telefon]' value='<?=$data['data'][0]['telefon']?>' maxlength='50'>
			</div>
		</div>
<!-- Allgemeine Angaben -->
		<div class="form-group">
			<div class="col-md-12">
				<h2>Allgemeine Angaben</h2>
			</div>
			<label class="col-md-2 control-label">Ich helfe beim:</label>
			<div class="col-md-10">
				<div class="checkbox-inline">
					<label><input type="checkbox" name='member[aufbau]' value='1' <?php if($data['data'][0]['aufbau'] == '1'):?> checked="checked" <?php endif; ?>>Aufbau</label>
				</div>
				<div class="checkbox-inline">
					<label><input type="checkbox" name='member[abbau]'  value='1' <?php if($data['data'][0]['abbau'] == '1'):?> checked="checked" <?php endif; ?>>Abbau</label>
				</div>
			</div>
		</div>							
		<div class="form-group">
			<label class="col-md-2 control-label">Larperfahrung</label>
			<div class="col-md-10">
				<div class="radio-inline">
			    	<label><input type='radio' name='member[erfahrung]' value='0' <?php if($data['data'][0]['erfahrung'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
				</div>
				<div class="radio-inline">
			    	<label><input type='radio' name='member[erfahrung]' value='1' <?php if($data['data'][0]['erfahrung'] != '0'):?> checked="checked" <?php endif; ?>>Ja</label>
				</div>
				<input id='erfahrung_tage' class="form-control" type='text' name='member[erfahrung_tage]' placeholder="Con-Tage gesamt" maxlength="4" value='<?=$data['data'][0]['erfahrung_tage']?>' />
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Sanitäter</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[sanitaeter]' value='0' <?php if($data['data'][0]['sanitaeter'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[sanitaeter]' value='1' <?php if($data['data'][0]['sanitaeter'] != '0'):?> checked="checked" <?php endif; ?>>Ja</label>
				</div>										
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Vegetarier</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[vegetarier]' value='0' <?php if($data['data'][0]['vegetarier'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[vegetarier]' value='1' <?php if($data['data'][0]['vegetarier'] != '0'):?> checked="checked" <?php endif; ?>>Ja</label>
				</div>
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Krankheiten / Allergien</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[krankheiten]' value='0' <?php if($data['data'][0]['krankheiten'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[krankheiten]' value='1' <?php if($data['data'][0]['krankheiten'] != '0'):?> checked="checked" <?php endif; ?>>Ja, und zwar</label><br />
				</div>
				<input id='krankheiten_welche' class="form-control" type='text' name='member[krankheiten_welche]' value='<?=$data['data'][0]['krankheiten_welche'];?>' placeholder='Krankheiten / Allergien' maxlength='100'>
			</div>
		</div>
		<div class="form-group">			
			<label class="col-md-2 control-label">Ich muss durchschlafen</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[durchschlafen]' value='0' <?php if($data['data'][0]['durchschlafen'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[durchschlafen]' value='1' <?php if($data['data'][0]['durchschlafen'] != '0'):?> checked="checked" <?php endif; ?>>Ja</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="zimmer" class="col-md-2 control-label">Ich m&ouml;chte mit folgenden Leuten in ein Zimmer:</label>
			<div class="col-md-10">
				<input class="form-control" type='text' id='zimmer' name='member[zimmer]' placeholder="Zimmergenossen" maxlength='100' value='<?=$data['data'][0]['zimmer']?>'> 		
			</div>
		</div>

<!-- SC / NSC -->
		<div class="form-group">
			<div class="col-md-12">
				<h2>Teilnehmerart</h2>
			</div>
			<label class="col-md-2 control-label">Ich komme als:</label>
			<div class="col-md-10">
				<div class="radio-inline">
					<label><input type='radio' name='member[rang]' value='sc' id="sc" onclick="toggle()" <?php if($data['data'][0]['rang'] == 'sc'):?> checked="checked" <?php endif; ?>>
					<?php if($scBan == true): ?>Spieler auf Warteliste<?php else: ?>Spieler<?php endif; ?></label>
				</div>
				<div class="radio-inline">
					<label><input type='radio' name='member[rang]' value='nsc' id="nsc" onclick="toggle()" <?php if($data['data'][0]['rang'] == 'nsc'):?> checked="checked" <?php endif; ?>> NSC</label>
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
					<input id='charname' name='sc[charname]' placeholder='Charaktername' value='<?=$data['sc'][0]['charname']?>' maxlength='50' type='text' class='form-control' />
				</div>					
			</div>
			<div class="form-group">
				<label for="rasse" class="col-md-2 control-label">Rasse</label>
				<div class="col-md-10">
					<input id="rasse" name='sc[rasse]' placeholder='Rasse' value='<?=$data['sc'][0]['rasse']?>' maxlength='50' type='text' class='form-control' />
				</div>
			</div>
			<div class="form-group">
				<label for="klasse" class="col-md-2 control-label">Klasse</label>
				<div class="col-md-10">
					<input id="klasse" name='sc[klasse]' placeholder="Klasse" value='<?=$data['sc'][0]['klasse']?>' maxlength='50' type='text' class='form-control' />
				</div>
			</div>
			<div class="form-group">
				<label for="herkunft" class="col-md-2 control-label">Herkunft (Land)</label>
				<div class="col-md-10">
					<input id="herkunft" name='sc[herkunft]' placeholder="Herkunft (Land)" value='<?=$data['sc'][0]['herkunft']?>' maxlength='50' type='text' class='form-control' />
				</div>
			</div>
			<div class="form-group">			
				<label class="col-md-2 control-label">Zauberkundig</label>
				<div class="col-md-10">
					<div class="radio-inline">
					   <label><input type='radio' name='sc[zauber]' value="0" <?php if($data['sc'][0]['zauber'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
					</div>
					<div class="radio-inline">
						<label><input type='radio' name='sc[zauber]' value="1" <?php if($data['sc'][0]['zauber'] != '0'):?> checked="checked" <?php endif; ?>>Ja</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="contage" class="col-md-2 control-label">Con-Tage des Charakters</label>
				<div class="col-md-10">
					<input id="contage" name='sc[contage]' placeholder="Con-Tage" value='<?=$data['sc'][0]['contage']?>' maxlength='3' type='text' class='form-control' />
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
						<label><input type='checkbox' name='nsc[festrolle_plot]' value="1" <?php if($data['nsc'][0]['festrolle_plot'] != '0'):?> checked="checked" <?php endif; ?>>Festrolle (plotrelevant)</label>
					</div>
				</div>
				<div class="col-md-2">
					<div class="checkbox">
						<label><input type='checkbox' name='nsc[festrolle_ambiente]' value="1" <?php if($data['nsc'][0]['festrolle_ambiente'] != '0'):?> checked="checked" <?php endif; ?>>Festrolle (Ambiente)</label>
					</div>
				</div>
				<div class="col-md-2">
					<div class="checkbox">
						<label><input type='checkbox' name='nsc[springer]' value="1" <?php if($data['nsc'][0]['springer'] != '0'):?> checked="checked" <?php endif; ?>>Springer</label>
					</div>
				</div>
				<div class="col-md-2">
					<div class="checkbox">
						<label><input type='checkbox' name='nsc[traeume]' value="1" <?php if($data['nsc'][0]['traeume'] != '0'):?> checked="checked" <?php endif; ?>>Träume</label>
					</div>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-md-2 control-label">Ich kann schminken:</label>
				<div class="col-md-10">
					<div class="radio-inline">
						<label><input type='radio' name='nsc[schminken]' value="0" <?php if($data['nsc'][0]['schminken'] == '0'):?> checked="checked" <?php endif; ?>>Nein</label>
					</div>
					<div class="radio-inline">
						<label><input type='radio' name='nsc[schminken]' value="1" <?php if($data['nsc'][0]['schminken'] != '0'):?> checked="checked" <?php endif; ?>>Ja</label>
					</div>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-md-2 control-label">Ich k&auml;mpfe:</label>
				<div class="col-md-10">
					<div class="radio-inline">
						<label><input type='radio' name='nsc[kaempfen]' value="0" <?php if($data['nsc'][0]['kaempfen'] == '0'):?> checked="checked" <?php endif; ?>>Ungern</label>
					</div>
					<div class="radio-inline">
						<label><input type='radio' name='nsc[kaempfen]' value="1" <?php if($data['nsc'][0]['kaempfen'] != '0'):?> checked="checked" <?php endif; ?>>Gerne</label>
					</div>
				</div>
			</div>
			<div class="form-group">			
				<label class="col-md-2 control-label">Ich zaubere:</label>
				<div class="col-md-10">
					<div class="radio-inline">
						<label><input type='radio' name='nsc[zaubern]' value="0" <?php if($data['nsc'][0]['zaubern'] == '0'):?> checked="checked" <?php endif; ?>>Ungern</label>
					</div>
					<div class="radio-inline">
						<label><input type='radio' name='nsc[zaubern]' value="1" <?php if($data['nsc'][0]['zaubern'] != '0'):?> checked="checked" <?php endif; ?>>Gerne</label>
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
				<div><textarea id="bemerkung" maxlength="500" class="form-control" rows='5' name='member[bemerkung]'><?=$data['data'][0]['bemerkung']?></textarea></div>
			</div>
		</div>
		<div class="form-group">
			<label for="bemerkung" class="col-md-2 control-label">Orga Notiz<br/>(nur intern)</label>
			<div class="col-md-10">
				<div><textarea id="orga_message" maxlength="500" class="form-control" rows='5' name='member[orga_message]'><?=$data['data'][0]['orga_message']?></textarea></div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<div class="checkbox">
				   <label><input type="checkbox" name='member[sichtbar]' value='1' <?php if($data['data'][0]['sichtbar'] == '1'):?> checked="checked" <?php endif; ?>>Name auf der HP</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<button class='btn btn-success' type='submit' id='submit'>Editieren</button>
			</div>
		</div>
	</form>


