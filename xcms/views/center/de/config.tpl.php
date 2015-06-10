<?

($c[0]['gazette'] == '1')? $gz1 = 'checked' : $gz2 = 'checked';
($c[0]['galerie'] == '1')? $ga1 = 'checked' : $ga2 = 'checked';
($c[0]['team'] == '1')? $t1 = 'checked' : $t2 = 'checked';
($c[0]['download_flyer'] == '1')? $df1 = 'checked' : $df2 = 'checked';

?>

<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>			
	<div style='margin: 0 0 20px 20px;'><a style='color: white; font-weight: bold' href='?action=admin'>&laquo; Zur&uuml;ck</a></div>
	<div class='anmeldung' style='width: 798px'>
		<div class='heading_admin' ><b>Config editieren</b></div>
		<br><br>
		
	<form action='<?echo $_SERVER['PHP_SELF']?>?action=editConfig' method='post' enctype='text/html'>
		<input type="hidden" name="id" value="<?php echo $c[0]['id'];?>">
		<div class='edit' style='position:absolute;'><b>Conname</b></div>
			<div style='position: relative; padding-left: 190px; margin-top: 5px'>
				<input type='text' name='conname' value='<?php echo $c[0]['conname'];?>' size='3' style='width: 200px'>
			</div>
			<div class='edit' style='position:absolute; margin-top: 5px'><b>Anzahl Spieler</b></div>
			<div style='position: relative; padding-left: 190px; margin-top: 5px'>
				<input type='text' name='sc_anz' value='<?php echo $c[0]['sc_anz'];?>' size='3' style='width: 200px'>
			</div>
			<div class='edit' style='position:absolute; margin-top: 5px'><b>Anzahl NSCs</b></div>
			<div style='position: relative; padding-left: 190px; margin-top: 5px'>
				<input type='text' name='nsc_anz' value='<?php echo $c[0]['nsc_anz'];?>' size='3' style='width: 200px'>
			</div>
			<div class='edit' style='position:absolute; margin-top: 5px'><b>Email</b></div>
			<div style='position: relative; padding-left: 190px; margin-top: 5px'>
				<input type='text' name='email' value='<?php echo $c[0]['email'];?>' size='3' style='width: 200px'>
			</div>			

			<div class='edit' style='position: absolute; margin-top: 3px'><b>Anzeige Teilnehmerliste</b></div>
			<div style='position: relative; padding-left: 190px; margin-top: 5px'>
				Vorname: <input type='radio' name='liste_vorname' value='1' <?php if($c[0]['liste_vorname'] == '1'): ?> checked="checked" <?php endif; ?> />  Ja
						<input type='radio' name='liste_vorname' value='0' <?php if($c[0]['liste_vorname'] == '0'): ?> checked="checked" <?php endif; ?> />  Nein<br />
				Nachname: <input type='radio' name='liste_nachname' value='1' <?php if($c[0]['liste_nachname'] == '1'): ?> checked="checked" <?php endif; ?>/>  Ja
							<input type='radio' name='liste_nachname' value='0' <?php if($c[0]['liste_nachname'] == '0'): ?> checked="checked" <?php endif; ?>/>  Nein <br />
				Wateliste: <input type='radio' name='liste_warteliste' value='1' <?php if($c[0]['liste_warteliste'] == '1'): ?> checked="checked" <?php endif; ?> />  Ja
							<input type='radio' name='liste_warteliste' value='0' <?php if($c[0]['liste_warteliste'] == '0'): ?> checked="checked" <?php endif; ?> />  Nein<br />
				Bezahlt: <input type='radio' name='liste_bezahlt' value='1' <?php if($c[0]['liste_bezahlt'] == '1'): ?> checked="checked" <?php endif; ?> /> Ja
						<input type='radio' name='liste_bezahlt' value='1' <?php if($c[0]['liste_bezahlt'] == '0'): ?> checked="checked" <?php endif; ?> /> Nein<br />
				Rang: <input type='radio' name='liste_rang' value='1' <?php if($c[0]['liste_rang'] == '1'): ?> checked="checked" <?php endif; ?> /> Ja
						<input type='radio' name='liste_rang' value='0' <?php if($c[0]['liste_rang'] == '0'): ?> checked="checked" <?php endif; ?> /> Nein
			</div>			
										
					
			<br /><br />
			<input type="submit" value="Aktualisieren"><br />
	</div>
	</form>
<?php else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<?php endif; ?>	
