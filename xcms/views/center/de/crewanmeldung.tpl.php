<?
echo "<pre>";
#print_r($_SESSION['c5']);
echo "</pre>";
?>

<?php if ($_SESSION['pacifare']['login']['admin'] == true): ?>
<script type="text/javascript" src="libs/js/ui.core.js"></script>
<script type="text/javascript" src="libs/js/ui.slider.js"></script>
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
	function toggle() {
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

<div style='margin: 0 0 20px 20px;'><a style='color: white; font-weight: bold' href='javascript:history.back(-1)'>&laquo; Zur&uuml;ck</a></div>	
	<div class='anmeldung'>
	<div class='heading'>
			<b>Crewanmeldung - Allgemeiner Teil</b>
	</div>		
		<form action='<? echo $_SERVER['PHP_SELF']?>?action=anmelden' method='POST' enctype='multipart/form-data' name="anmeldung"  onsubmit="return checkSubmitForm();">
			<br>
			<div class='header' style='position: absolute'>
				<b>Vorname</b><span style='color: red'> *</span>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input id='vorname' type='text' name='member[vorname]' value='<? echo $_SESSION['c5']['member']['vorname']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'>
				<b>Nachname</b><span style='color: red'> *</span>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input id='nachname' type='text' name='member[nachname]' value='<? echo $_SESSION['c5']['member']['nachname']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'>
				<b>Strasse</b><span style='color: red'> *</span>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input id='strasse' type='text' name='member[strasse]' value='<? echo $_SESSION['c5']['member']['strasse']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'>
				<b>Postleitzahl</b><span style='color: red'> *</span>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input id='plz' type='text' name='member[plz]' value='<? echo $_SESSION['c5']['member']['plz']?>' size='5' maxlength='5' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'>
				<b>Ort</b><span style='color: red'> *</span>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input id='ort' type='text' name='member[ort]' value='<? echo $_SESSION['c5']['member']['ort']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>						
			<div class='header' style='position: absolute'>
				<b>Telefon</b>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input type='text' name='member[telefon]' value='<? echo $_SESSION['c5']['member']['telefon']?>' size='30' onkeypress="return noreturn(event);">
			</div>
			<br>
			<div class='header' style='position: absolute'>
				<b>Geburtsdatum</b><span style='color: red'> *</span>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input id='geb_datum' type='text' name='member[geb_datum]' value='<? echo $_SESSION['c5']['member']['geb_datum']?>' size='10' maxlength='10' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'>
				<b>E-Mail</b><span style='color: red'> *</span>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input id='email' type='text' name='member[email]' value='<? echo $_SESSION['c5']['member']['email']?>' size='30' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'>
				<b>Krankheiten</b>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input type='text' name='member[krankheiten]' value='<? echo $_SESSION['c5']['member']['krankheiten']?>' size='30' onkeypress="return noreturn(event);">
			</div><br>
			<div class='header' style='position: absolute'>
				<b>Zimmerbelegung</b>
			</div>
			<div style='position: relative; padding-left: 100px'>
				<img src='views/images/icons/help.png' onmouseover="Tip('Gib an, mit wem du gerne<br> auf ein Zimmer m&ouml;chtest.')"; onmouseout="UnTip()";>
				<input type='text' name='member[zimmer]' value='<? echo $_SESSION['c5']['member']['zimmer']?>' size='30' onkeypress="return noreturn(event);">
			</div><br>			
			<div class='header' style='position: absolute'>
				<b>Sanit&auml;ter</b> (bitte Bescheinigung mitbringen)
			</div>
			<div style='position: relative; padding: 15px 0 0 120px'>
				<input type='radio' name='member[sanitaeter]' value='0' class='radio' <? if (isset($_SESSION['c5']['member']['sanitaeter'])) echo ($_SESSION['c5']['member']['sanitaeter'] == '0')? 'checked' : ''; else echo 'checked';?>> Nein &nbsp;
				<input type='radio' name='member[sanitaeter]' value='1' class='radio' <? echo ($_SESSION['c5']['member']['sanitaeter'] == '1')? 'checked' : '';?>> Ja
			</div><br>
			<div class='header' style='position: absolute'>
				<b>Vegetarier</b>
			</div>
			<div style='position: relative; padding-left: 120px'>
				<input type='radio' name='member[vegetarier]' value='0' class='radio' <? if (isset($_SESSION['c5']['member']['vegetarier'])) echo ($_SESSION['c5']['member']['vegetarier'] == '0')? 'checked' : ''; else echo 'checked';?>> Nein &nbsp;
				<input type='radio' name='member[vegetarier]' value='1' class='radio' <? echo ($_SESSION['c5']['member']['vegetarier'] == '1')? 'checked' : '';?>> Ja
			</div><br>
			<div class='header' style='position: absolute'><b>Mitfahrzentrale</b> &nbsp;<span id='mitfahr'></span></div>
			<div class='smallbox' style='display: <? echo ($_SESSION['c5']['member']['mitfahr1'] != '') ? 'block' : 'none';?>; margin-left: 20px; top: 20px; position: relative;' id='show_mitfahr'>
				<input type='radio' name='member[mitfahr1]' value='' <? if ($_SESSION['c5']['member']['mitfahr1'] != '') echo ($_SESSION['c5']['member']['mitfahr1'] == 'biete')? 'checked' : ''; else echo 'checked';?> >&nbsp;<b>nix</b></b><input type='radio' name='member[mitfahr1]' value='biete' <? echo ($_SESSION['c5']['member']['mitfahr1'] == 'biete')? 'checked' : '';?> >&nbsp;Ich <b>biete:</b><input type='radio' name='member[mitfahr1]' value='suche'  <? echo ($_SESSION['c5']['member']['mitfahr1'] == 'suche')? 'checked' : '';?>>&nbsp;Ich <b>suche:</b><br>	<br>
				<span style='padding-left: 65px'><input type="text" name="member[mitfahr2]" value="<? echo $_SESSION['c5']['member']['mitfahr2']?>" size='3'> Platz/ Plätze ab <input type="text" name="member[mitfahr3]" value="<? echo $_SESSION['c5']['member']['mitfahr3']?>" size='30'></span><br>
			</div><br><br>

			<input type="hidden" name="member[rang]" value="0">
		
		<div class='heading' style='margin-top: 20px'>
				<b>Sonstiges</b><span id='bar_art' style='text-weight: bold'></span>
		</div><br>			
			<div class='header' style='position: absolute'>
				<b>Bemerkung</b>
			</div>
			<div style='position: relative; padding-left: 130px'>
				<textarea cols='30' rows='5' name='member[bemerkung]'><? echo $_SESSION['c5']['member']['bemerkung']?></textarea>
			</div><br />
			<div class='header' style='position: absolute'>
				<b>Mein Name auf der HP</b>&nbsp;<img src='views/images/icons/help.png' onmouseover="Tip('Dein Name erscheint in der<br> Teilnehmerliste auf der Homepage')" onmouseout="UnTip()">
				 &nbsp;<input type='checkbox' name='member[sichtbar]' value='1' class='radio' <? if (isset($_SESSION['c5']['member']['sichtbar'])) echo ($_SESSION['c5']['member']['sichtbar'] == '1')? 'checked' : ''; else echo 'checked';?>>
			</div><br><br>
			<div class='header'>
				<b>Ich habe die <a href='?action=agb' target=_blank>AGB</a> gelesen und akzeptiert.</b>
				<input type='checkbox' name='agb' value='true' id='agb' onclick='toggle()' class='radio'>
			</div>
			<br>
			<center><input style='border: 1px solid white; background-color: red; color: white; font-weight: bold' type='submit' value=' Anmelden ' style='border: 1px solid black' disabled="disabled" id='submit'></div>
		</form>
	</div>	
	<div style='text-size: 10px; color: red; padding: 10px; margin-left: 200px'>(Mit <b>*</b> gekennzeichnete Felder sind Pflichtfelder)</span>

	
<? else: ?>
	<script>self.location.href='index.php'</script
<? endif;?>