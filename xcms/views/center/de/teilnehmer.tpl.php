<?

$scRest = ($config[0]['sc_anz']-$c['sc']);
$scBan = ($scRest <= '0') ? true : false;
$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
$nscBan = ($nscRest <= '0') ? true : false;



?>

<script language="javascript">
$(document).ready(function(){
    $.tablesorter.defaults.widgets = ['zebra']; 
	$("#teilnehmer").tablesorter({
		widgets: ['zebra']
	});
});
</script>

<style>

	table {
		margin: 20px 0 20px 0 !important;
		padding: 0 5px;
		font: 10px "Lucida Grande", Helvetica, Verdana, Arial;
	}

	th, td {
		padding: 1px 10px 1px 4px;
		vertical-align: top;
		height: 15px;
		border: 1px solid black;
		border-top: none;
		color: black;
	}
	
	th {
		background-color: #82CFEF;
		color: white;
		border: solid 1px black;	
	}
	
	tbody tr {
		border: 1px solid black;
		background-color:  #A4C3CC;
	}
	
	tbody tr.even {
		background-color: #9AB7BF;
	
	}
	
	a:link, a:active, a:visited {
		text-decoration: none;
	}
	
	.button {
		border: 1px solid black;
		font: 12px "Lucida Grande", Helvetica, Verdana, Arial;
		background-color: white;
	}

.sort {
    text-decoration: none;
    color: #888;
    background-color: #fea;
    border: 1px solid #ddd;
    width: 100px;
    padding: 5px 0;
    text-align: center;
}	

</style>
	<div class='anmeldung' style='width: 798px'>
		<div class='heading'>
				<b>Teilnehmer</b><span id='bar_art' style='text-weight: bold'></span>
		</div>
		
		<br />
	<?php if($config[0]['stats'] == '1'): ?>
		<div>
		<fieldset style='padding:10px;border:1px solid white; width:550px'>
		<legend>Statistik:</legend>
			<b>Verf&uuml;gbarkeit:</b><br /><br />
		<? if ($scBan == false): ?>
			<li style='margin-left: 20px'>Es haben sich bisher <b><? echo $c['sc']; ?></b> von <b><?echo $config[0]['sc_anz']; ?></b> m&ouml;glichen Spieler angemeldet, es sind noch <b><?php echo ($config[0]['sc_anz']-$c['sc']);?></b> Pl&auml;tze verf&uuml;gbar.</li>
		<? else: ?>
			<li style='margin-left: 20px'>Es sind <b>keine</b> Spielerpl&auml;tze f&uuml;r das $config[0]['conname'] mehr verf&uuml;gbar.</li>
		<? endif; ?>
		<? if ($nscBan == false): ?>
			<li style='margin-left: 20px'>Es haben sich bisher <b><? echo $c['nsc']; ?></b> von <b><?echo $config[0]['nsc_anz']; ?></b> m&ouml;glichen NSCs angemeldet, es sind noch <b><?php echo ($config[0]['nsc_anz']-$c['nsc']);?></b> Pl&auml;tze verf&uuml;gbar.</li>
		<? else: ?>
			<li style='margin-left: 20px'>Es sind <b>keine</b> NSCpl&auml;tze f&uuml;r das $config[0]['conname'] mehr verf&uuml;gbar.</li>
		<? endif; ?>		
			<br />
			<span style='font-size:10px'>(Aufgrund der Privatsph&auml;re wird hier eventuell nicht jeder Teilnehmer gelistet)</span>
		</fieldset>
		</div>
	<?php endif; ?>

		<table><tr style='text-align: center'>
			<?
				for($i = 65; $i <= 90; $i++)
				{
					$buchstabe = chr($i);
					echo "<td class=tbl_minilink><a href='#".$buchstabe."'>$buchstabe</a></td>";
				}
			?>
		</tr></table>
		
	<table id="teilnehmer" cellspacing="0" style='width: 780px;'>
	<thead>
		<tr>
		<?php if($config[0]['liste_nachname'] == '1'): ?>
			<th style='font-size: 12px; text-align: center; height: 15px; width: 190px; background-color: #3F1719'>Nachname</th>		
		<?php endif; ?>
		<?php if($config[0]['liste_vorname'] == '1'): ?>			
			<th style='font-size: 12px; text-align: center; height: 15px; width: 190px; background-color: #3F1719'>Vorname</th>
		<?php endif; ?>
		<?php if($config[0]['liste_rang'] == '1'): ?>			
			<th style='font-size: 12px; text-align: center; height: 15px; width: 190px; background-color: #3F1719'>Rang</th>
		<?php endif; ?>			
		<?php if($config[0]['liste_warteliste'] == '1'): ?>			
			<th style='font-size: 12px; text-align: center; height: 15px; width: 30px; background-color: #3F1719'>Warteliste</th>
		<?php endif; ?>			
		<?php if($config[0]['liste_bezahlt'] == '1'): ?>			
			<th style='font-size: 12px; text-align: center; height: 15px; width: 190px; background-color: #3F1719'>Bezahlt</th>
		<?php endif; ?>			

		</tr>
	</thead>
	<tbody>
		<?
		$nsc = 0;
		$sc = 0;
		if ($data != ''){
			for($i = 65; $i <= 90; $i++)
			{
				$buchstabe = chr($i);
				$c=0;
				foreach($data as $datas){
					if ($datas['rang'] == '1')
						$sc++;
					else 
						$nsc++;
						
					if (ucfirst(substr($datas['nachname'], 0,1)) == $buchstabe){
						if ($c == '0')
							echo "
								<tr><td colspan='5' style='background-color: #5C6D73; border: none'>&nbsp;</td></tr>
								<tr><td colspan='5' class='tbl_char'><li><a name='$buchstabe' style='color: white; text-decoration: none'>".$buchstabe."</a></li></td></tr>
							";
					$status_wl  = ($datas['warteliste'] == '1') ? 'power_on' : 'power_off';
					$status_bez  = ($datas['bezahlt'] == '1') ? 'power_on' : 'power_off';

					echo "<tr>";
						if($config[0]['liste_nachname'] == '1') {
							echo "<td>".ucfirst($datas['nachname'])."</td>";
						}
						if($config[0]['liste_vorname'] == '1') {
							echo "<td>".ucfirst($datas['vorname'])."</td>";
						}
						if($config[0]['liste_rang'] == '1') {
							echo "<td>".ucfirst($datas['rang'])."</td>";
						}
						if($config[0]['liste_warteliste'] == '1') {
							echo "<td style='text-align: center'><img src='xcms/views/images/icons/".$status_wl.".png' title='Warteliste' alt='Warteliste' /></td>";
						}
						if($config[0]['liste_bezahlt'] == '1') {
							echo "<td style='text-align: center'><img src='xcms/views/images/icons/".$status_bez.".png' title='Bezahlstatus' alt='Bezahlstatus' /></td>";
						}
						echo "</tr>";
					$c++;
					}
				}
			}
		}

	?>
	
	</tbody>
</table>
	<div><span style='color: green; background-color: #3F1719;padding:5px'><b>gr&uuml;ne</b> - Teilnehmer sind best&auml;tigt</span></div>
	</div>
