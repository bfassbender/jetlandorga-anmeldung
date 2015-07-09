<?
$scRest = ($config[0]['sc_anz']-$c['sc']);
$scBan = ($scRest <= '0') ? true : false;
$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
$nscBan = ($nscRest <= '0') ? true : false;
?>

<script type="text/javascript">
	$(document).ready(function(){
		toggleStartup("<?=$data['data'][0]['rang']?>", "<?=$data['nsc'][0]['unterkunft']?>");
	});
  	function noreturn(e) {
  		return e.keyCode==13? false:true;
	}

	function toggleStartup (type, unterkunft) {
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
			if(unterkunft == 'huette') {
				$('#nsc_1').prop('checked', true);				
				$('#bar_art').html(' NSC Huette');
			} else {
				$('#nsc_2').prop('checked', true);				
				$('#bar_art').html(' NSC Zelt');
			}	
			$('#bar_art').css('font-weight', 'bold');
		}
	}

	function toggleEdit() {
		
		if($('#nsc_1').is(':checked') || $('#nsc_2').is(':checked')){
			$('#boxnsc').show('fast');
			$('#boxsc').hide('fast');
			if($('#nsc_1').is(':checked')) {
				$('#bar_art').html(' NSC Huette');
			} else {
				$('#bar_art').html(' NSC Zelt');
			}
			$('#bar_art').css('font-weight', 'bold');
		} else if($('#sc').is(':checked')){
			$('#boxsc').show('fast');
			$('#boxnsc').hide('fast');
			$('#bar_art').html(' Spieler');
			$('#bar_art').css('font-weight', 'bold');			
		}
	}	
</script>

<style>
	input, textarea, select {
		color: black;
	}
</style>

<?=print_r($data);?>

<div id="container" >
		<form action='<? echo $_SERVER['PHP_SELF']?>?action=editUser' method='POST' enctype='multipart/form-data' name="anmeldung" >
			<input type="hidden" name="member[id]" value="<?=$data['data'][0]['id']?>" />
		<br>
			<div class='header' style='position: absolute'><b>Gelöscht</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input type='radio' name='member[deleted]' value='0' class='radio' <?php if($data['data'][0]['deleted'] == '0'):?> checked="checked" <?php endif; ?>> Nein &nbsp;
				<input type='radio' name='member[deleted]' value='1' class='radio' <?php if($data['data'][0]['deleted'] == '1'):?> checked="checked" <?php endif; ?>> Ja
				<?php if ($data['data'][0]['deleted'] == '1'): ?> am (<?=date('d.m.Y', $data['data'][0]['deleted_date']);?>)<?php endif; ?>
			</div>		
			<div class='header' style='position: absolute'><b>Vorname</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input id='vorname' type='text' name='member[vorname]' value='<?=$data['data'][0]['vorname']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'><b>Nachname</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input id='nachname' type='text' name='member[nachname]' value='<?=$data['data'][0]['nachname']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'><b>Strasse</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input id='strasse' type='text' name='member[strasse]' value='<?=$data['data'][0]['strasse']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'><b>Postleitzahl</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input id='plz' type='text' name='member[plz]' value='<?=$data['data'][0]['plz']?>' size='5' maxlength='5' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'><b>Ort</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input id='ort' type='text' name='member[ort]' value='<?=$data['data'][0]['ort']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>						
			<div class='header' style='position: absolute'><b>Telefon</b></div>
			<div style='position: relative; padding-left: 130px'>
				<input type='text' name='member[telefon]' value='<?=$data['data'][0]['telefon']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'><b>Geburtsdatum</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input id='geb_datum' type='text' name='member[geb_datum]' value='<?=$data['data'][0]['geb_datum']?>' size='10' maxlength='10' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>E-Mail</b><span style='color: red'> *</span></div>
			<div style='position: relative; padding-left: 130px'>
				<input id='email' type='text' name='member[email]' value='<?=$data['data'][0]['email']?>' size='30' onkeypress="return noreturn(event);">
			</div><br>
			<br />			
			<div class='heading'><b>Allgemeine Angaben</b></div>	
			<br />				
			<div class='header' style='position: absolute'><b>Ich helfe beim:</b></div>
			<div style='position: relative; padding-left: 130px'>
				<input type='checkbox' name='member[aufbau]' value='1' class='radio' <?php if($data['data'][0]['aufbau'] == '1'):?> checked="checked" <?php endif; ?>> Aufbau &nbsp;
				<input type='checkbox' name='member[abbau]' value='1' class='radio' <?php if($data['data'][0]['abbau'] == '1'):?> checked="checked" <?php endif; ?>> Abbau
			</div><br>
			<div class='header' style='position: absolute'><b>Larperfahrung</b></div>
			<div style='position: relative; padding-left: 130px'>
				<input type='radio' name='member[erfahrung]' value='0' class='radio' <?php if($data['data'][0]['erfahrung'] == '0'):?> checked="checked" <?php endif; ?>> Nein &nbsp;
				<input type='radio' name='member[erfahrung]' value='1' class='radio'  <?php if($data['data'][0]['erfahrung'] != '0'):?> checked="checked" <?php endif; ?>> Ja &nbsp; (Con-Tage insgesamt) &nbsp;
				<input type='text' name='member[erfahrung_tage]' value='<?=$data['data'][0]['erfahrung_tage']?>' class='radio'> 
			</div><br>
			<div class='header' style='position: absolute'><b>Sanit&auml;ter</b></div>
			<div style='position: relative; padding-left: 130px'>
				<input type='radio' name='member[sanitaeter]' value='0' class='radio' <?php if($data['data'][0]['sanitaeter'] == '0'):?> checked="checked" <?php endif; ?>> Nein &nbsp;
				<input type='radio' name='member[sanitaeter]' value='1' class='radio' <?php if($data['data'][0]['sanitaeter'] == '1'):?> checked="checked" <?php endif; ?>> Ja
			</div><br>
			<div class='header' style='position: absolute'><b>Vegetarier</b></div>
			<div style='position: relative; padding-left: 130px'>
				<input type='radio' name='member[vegetarier]' value='0' class='radio' <?php if($data['data'][0]['vegetarier'] == '0'):?> checked="checked" <?php endif; ?>> Nein &nbsp;
				<input type='radio' name='member[vegetarier]' value='1' class='radio' <?php if($data['data'][0]['vegetarier'] == '1'):?> checked="checked" <?php endif; ?>> Ja
			</div><br>
			<div class='header' style='position: absolute'><b>Krankheiten/ <br />Allergien</b></div>
			<div style='position: relative; padding-left: 130px'>
				<input type='radio' name='member[krankheiten]' value='0' class='radio' <?php if($data['data'][0]['krankheiten'] == '0'):?> checked="checked" <?php endif; ?>> Nein &nbsp;
				<input type='radio' name='member[krankheiten]' value='1' class='radio' <?php if($data['data'][0]['krankheiten'] != '0'):?> checked="checked" <?php endif; ?>> Ja, &nbsp;
			<?php if($data['data'][0]['krankheiten'] != '0'):?>
				<input type='text' name='member[krankheiten_welche]' value='<?=$data['data'][0]['krankheiten'];?>' class='radio'> 				
			<?php else: ?>
				<input type='text' name='member[krankheiten_welche]' value='' class='radio'> 				
			<?php endif; ?>
			</div><br>
			<div class='header' style='position: absolute'><b>Ich muss durchschlafen</b></div>
			<div style='position: relative; padding-left: 200px'>
				<input type='radio' name='member[durchschlafen]' value='0' class='radio' <?php if($data['data'][0]['durchschlafen'] == '0'):?> checked="checked" <?php endif; ?>> Nein &nbsp;
				<input type='radio' name='member[durchschlafen]' value='1' class='radio' <?php if($data['data'][0]['durchschlafen'] == '1'):?> checked="checked" <?php endif; ?>> Ja

			</div>
			<span class="small">(Nur Ja ankreuzen, wenn medizinische Gr&uuml;nde vorliegen)</span><br><br />
			<div class='header' style='position: absolute'><b>Ich m&ouml;chte mit folgenden Leuten<br/> in ein Zimmer:</b></div>			
			<div style='position: relative; padding-left: 300px'>			
				<input type='text' name='member[zimmer]' value='<?=$data['data'][0]['zimmer']?>' class='radio'> 		
			</div><br />
		<div class='heading' style='margin-top: 20px'>
				<b>Teilnehmerart</b><span id='bar_art' style='text-weight: bold'><b>&nbsp;Spieler</b></span>
		</div><br>
			<div class='header' style='position: absolute'>
				<b>Ich komme als:</b><span style='color: red'> *</span>
			</div>	
			<div style='position: relative; padding-left: 150px;'>
				<input type='radio' name='member[rang]' value='sc' id="sc" checked="checked" class='radio' onclick="toggleEdit()"> <b>Spieler</b> &nbsp;
				<input type='radio' name='member[rang]' value='nsc|huette' id="nsc_1" class='radio' onclick="toggleEdit()"> <b>NSC (H&uuml;tte)</b>
				<input type='radio' name='member[rang]' value='nsc|zelt' id="nsc_2" class='radio' onclick="toggleEdit()"> <b>NSC (<u>eigenes</u> Zelt)</b>				
				<input type="hidden" name="member[old_rang]" value="<?=$data['data'][0]['rang']?>" />
			</div><br><br>
		<div id="boxsc" style="display:block">
			<div class='header' style='position: absolute'><b>Spieler</b></div>
			<br />
			<b> Angaben zum Charakter:</b><br /><br />
			<div class='header' style='position: absolute'><b>Charaktername</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='charname' type='text' name='sc[charname]' size='30' value="<?=$data['sc'][0]['charname']?>" onkeypress="return noreturn(event);">
			</div><br>			
			<div class='header' style='position: absolute'><b>Rasse</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='rasse' type='text' name='sc[rasse]' size='30' value="<?=$data['sc'][0]['rasse']?>" onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Klasse</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='klasse' type='text' name='sc[klasse]' size='30' value="<?=$data['sc'][0]['klasse']?>" onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Herkunft (Land)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='herkunft' type='text' name='sc[herkunft]' size='30' value="<?=$data['sc'][0]['herkunft']?>" onkeypress="return noreturn(event);">
			</div><br>	
			<div class='header' style='position: absolute'><b>Zauberkundig</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='radio' name='sc[zauber]' value="0" size='30' onkeypress="return noreturn(event);" <?php if($data['sc'][0]['zauber'] == '0'):?> checked="checked" <?php endif; ?>> Nein
				<input type='radio' name='sc[zauber]' value="1" size='30' onkeypress="return noreturn(event);" <?php if($data['sc'][0]['zauber'] == '1'):?> checked="checked" <?php endif; ?>> Ja
			</div><br>
			<div class='header' style='position: absolute'><b>Con-Tage<br /> (Charakter)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input id='contage' type='text' name='sc[contage]' size='30' value="<?=$data['sc'][0]['contage']?>" onkeypress="return noreturn(event);">
			</div><br>														
		</div>
		<div id="boxnsc" style="display:none">
			<div class='header' style='position: absolute'><b>NSC</b></div>
			<br />
			<div class='header' style='position: absolute'><b>Festrolle<br /> (plotrelevant)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[festrolle_plot]' value="1" size='30' <?php if($data['nsc'][0]['festrolle_plot'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);">
			</div><br>			
			<div class='header' style='position: absolute'><b>Festrolle<br /> (Ambiente)</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[festrolle_ambiente]' value="1" size='30' <?php if($data['nsc'][0]['festrolle_ambiente'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Springer</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[springer]' value="1" size='30' <?php if($data['nsc'][0]['springer'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Dungeon</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[dungeon]' value="1" size='30' <?php if($data['nsc'][0]['dungeon'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Tr&auml;ume</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='checkbox' name='nsc[traeume]' value="1" size='30' <?php if($data['nsc'][0]['traeume'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'><b>Ich kann schminken:</b></div>
			<div style='position: relative; padding-left: 180px'>
				<input type='radio' name='nsc[schminken]' value="0" size='30' <?php if($data['nsc'][0]['schminken'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);"> Nein
				<input type='radio' name='nsc[schminken]' value="1" size='30' <?php if($data['nsc'][0]['schminken'] == '1'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);"> Ja
			</div><br>
			<div class='header' style='position: absolute'><b>Ich k&auml;mpfe:</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='radio' name='nsc[kaempfen]' value="0" size='30' <?php if($data['nsc'][0]['kaempfen'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);"> Ungern
				<input type='radio' name='nsc[kaempfen]' value="1" size='30' <?php if($data['nsc'][0]['kaempfen'] == '1'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);"> Gerne
			</div><br>
			<div class='header' style='position: absolute'><b>Ich zaubere:</b></div>
			<div style='position: relative; padding-left: 140px'>
				<input type='radio' name='nsc[zaubern]' value="0" size='30' <?php if($data['nsc'][0]['zaubern'] == '0'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);"> Ungern
				<input type='radio' name='nsc[zaubern]' value="1" size='30' <?php if($data['nsc'][0]['zaubern'] == '1'):?> checked="checked" <?php endif; ?> onkeypress="return noreturn(event);"> Gern
			</div><br>
		</div>
		<br />		
		<div class='heading' style='margin-top: 20px'>
				<b>Sonstiges</b><span id='bar_art' style='text-weight: bold'></span>
		</div><br>			
		
			<div class='header' style='position: absolute'>
				<b>Bemerkung</b>
			</div>
			<div style='position: relative; padding-left: 130px'>
				<textarea cols='30' rows='5' name='member[bemerkung]'><?=$data['data'][0]['bemerkung']?></textarea>
			</div><br />
			<div class='header' style='position: absolute'>
				<b>Orga Nachricht<br />(nur intern)</b>
			</div>
			<div style='position: relative; padding-left: 130px'>
				<textarea cols='30' rows='5' name='member[orga_message]'><?=$data['data'][0]['orga_message']?></textarea>
			</div><br />			
			<div class='header' style='position: absolute'>
				<b>Mein Name auf der HP</b>&nbsp;<img src='xcms/views/images/icons/help.png' onmouseover="Tip('Dein Name erscheint in der<br> Teilnehmerliste auf der Homepage')" onmouseout="UnTip()">
				 &nbsp;<input type='checkbox' name='member[sichtbar]' value='1' class='radio' <? if (isset($_SESSION['c5']['member']['sichtbar'])) echo ($_SESSION['c5']['member']['sichtbar'] == '1')? 'checked' : ''; else echo 'checked';?>>
			</div><br><br>

			<br>
			<center><input style='border: 1px solid white; background-color: green; color: white; font-weight: bold' type='submit' value=' Editieren ' style='border: 1px solid black'id='submit'></div>
		</form>
	</div>	
	<div style='text-size: 10px; color: red; padding: 10px; margin-left: 200px'>(Mit <b>*</b> gekennzeichnete Felder sind Pflichtfelder)</span>
</div>
