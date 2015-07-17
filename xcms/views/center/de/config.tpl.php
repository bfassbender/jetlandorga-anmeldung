<?
	($c[0]['gazette'] == '1')? $gz1 = 'checked' : $gz2 = 'checked';
	($c[0]['galerie'] == '1')? $ga1 = 'checked' : $ga2 = 'checked';
	($c[0]['team'] == '1')? $t1 = 'checked' : $t2 = 'checked';
	($c[0]['download_flyer'] == '1')? $df1 = 'checked' : $df2 = 'checked';
?>

<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>
<div class="container" id="inline_content">
	<div><b><a href='?action=admin'>&laquo; Zur&uuml;ck</a></b></div>
	<h1>Config editieren</h1>
	<form class="form-horizontal" role="form" action='<?echo $_SERVER['PHP_SELF']?>?action=editConfig' method='post' enctype='text/html'>
		<input type="hidden" name="id" value="<?php echo $c[0]['id'];?>">
		<div class="form-group">
			<label for="conname" class="col-md-2 control-label">Con Name</span></label>
			<div class="col-md-4">
				<input id="conname" type="text" class="form-control" placeholder="Con Name" name='conname' value='<?php echo $c[0]['conname'];?>' maxlength='50' required />
			</div>
		</div>
		<div class="form-group">
			<label for="sc_anz" class="col-md-2 control-label">Anzahl Spieler</span></label>
			<div class="col-md-4">
				<input id="sc_anz" type="text" class="form-control" placeholder="Con Name" name='sc_anz' value='<?php echo $c[0]['sc_anz'];?>' maxlength='50' required />
			</div>
		</div>
		<div class="form-group">
			<label for="nsc_anz" class="col-md-2 control-label">Anzahl NSC</span></label>
			<div class="col-md-4">
				<input id="nsc_anz" type="text" class="form-control" placeholder="Con Name" name='nsc_anz' value='<?php echo $c[0]['nsc_anz'];?>' maxlength='50' required />
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-md-2 control-label">Email</span></label>
			<div class="col-md-4">
				<input id="email" type="text" class="form-control" placeholder="Con Name" name='email' value='<?php echo $c[0]['email'];?>' maxlength='50' required />
			</div>
		</div>
	
		<h3>Anzeige Teilnehmerliste</h3>
		<div class="form-group">			
			<label class="col-md-2 control-label">Vorname</label>
			<div class="col-md-10">
				<div class="radio">
					<label><input type='radio' name='liste_vorname' value='1' <?php if($c[0]['liste_vorname'] == '1'): ?> checked="checked" <?php endif; ?> /> Ja</label>&nbsp;
					<label><input type='radio' name='liste_vorname' value='0' <?php if($c[0]['liste_vorname'] == '0'): ?> checked="checked" <?php endif; ?> /> Nein</label>
				</div>
			</div>
		
			<label class="col-md-2 control-label">Nachname</label>
			<div class="col-md-10">
				<div class="radio">
					<label><input type='radio' name='liste_nachname' value='1' <?php if($c[0]['liste_nachname'] == '1'): ?> checked="checked" <?php endif; ?> /> Ja</label>&nbsp;
					<label><input type='radio' name='liste_nachname' value='0' <?php if($c[0]['liste_nachname'] == '0'): ?> checked="checked" <?php endif; ?> /> Nein</label>
				</div>
			</div>

			<label class="col-md-2 control-label">Warteliste</label>
			<div class="col-md-10">
				<div class="radio">
					<label><input type='radio' name='liste_warteliste' value='1' <?php if($c[0]['liste_warteliste'] == '1'): ?> checked="checked" <?php endif; ?> />  Ja</label>&nbsp;
					<label><input type='radio' name='liste_warteliste' value='0' <?php if($c[0]['liste_warteliste'] == '0'): ?> checked="checked" <?php endif; ?> />  Nein</label>
				</div>
			</div>

			<label class="col-md-2 control-label">Bezahlt</label>
			<div class="col-md-10">
				<div class="radio">
					<label><input type='radio' name='liste_bezahlt' value='1' <?php if($c[0]['liste_bezahlt'] == '1'): ?> checked="checked" <?php endif; ?> /> Ja</label>&nbsp;
					<label><input type='radio' name='liste_bezahlt' value='0' <?php if($c[0]['liste_bezahlt'] == '0'): ?> checked="checked" <?php endif; ?> /> Nein</label>
				</div>
			</div>

			<label class="col-md-2 control-label">Rang</label>
			<div class="col-md-10">
				<div class="radio">
					<label><input type='radio' name='liste_rang' value='1' <?php if($c[0]['liste_rang'] == '1'): ?> checked="checked" <?php endif; ?> /> Ja</label>&nbsp;
					<label><input type='radio' name='liste_rang' value='0' <?php if($c[0]['liste_rang'] == '0'): ?> checked="checked" <?php endif; ?> /> Nein</label>
				</div>
			</div>

		</div>

		<div class="form-group">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<input class="btn btn-primary" type="submit" value=" Configuration speichern ">
			</div>
		</div>
	</form>
</div>

		
		

			
			

<?php else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<?php endif; ?>	
