<?
$scRest = ($config[0]['sc_anz']-$c['sc']);
$scBan = ($scRest <= '0') ? true : false;
$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
$nscBan = ($nscRest <= '0') ? true : false;
?>

<script>
$(document).ready(function(){
	$(function(){
		$("#teilnehmer").tablesorter({
			theme : "bootstrap",
			headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
			sortList : [[0,0], [1,0]],
			widgets : [ "uitheme","zebra" ]
		});
	});
});
</script>

<div class='container'>
	<div class="text-background">
		<h1>Anmeldestatus</h1>
	<?php if($config[0]['stats'] == '1'): ?>
		<ul>
		<? if ($scBan == false): ?>
			<li style='margin-left: 20px'>Es haben sich bisher <b><? echo $c['sc']; ?></b> von <b><?echo $config[0]['sc_anz']; ?></b> m&ouml;glichen <b>Spieler</b> angemeldet, es sind noch <b><?php echo ($config[0]['sc_anz']-$c['sc']);?></b> Pl&auml;tze verf&uuml;gbar.</li>
		<? else: ?>
			<li style='margin-left: 20px'>Es sind <b>keine</b> Spielerpl&auml;tze f&uuml;r das $config[0]['conname'] mehr verf&uuml;gbar.</li>
		<? endif; ?>
		<? if ($nscBan == false): ?>
			<li style='margin-left: 20px'>Es haben sich bisher <b><? echo $c['nsc']; ?></b> von <b><?echo $config[0]['nsc_anz']; ?></b> m&ouml;glichen <b>NSCs</b> angemeldet, es sind noch <b><?php echo ($config[0]['nsc_anz']-$c['nsc']);?></b> Pl&auml;tze verf&uuml;gbar.</li>
		<? else: ?>
			<li style='margin-left: 20px'>Es sind <b>keine</b> NSCpl&auml;tze f&uuml;r das $config[0]['conname'] mehr verf&uuml;gbar.</li>
		<? endif; ?>		
			<li style='margin-left: 20px'>Aufgrund von Privatsph&auml;re Einstellungen wird hier eventuell nicht jeder Teilnehmer gelistet</li>
		</ul>
	</div>
	<?php endif; ?>
	<div class="table-background">
		<table id="teilnehmer" class="table table-striped">
			<thead>
				<tr>
					<?php if($config[0]['liste_nachname'] == '1'): ?>
						<th>Nachname</th>		
					<?php endif; ?>
					<?php if($config[0]['liste_vorname'] == '1'): ?>			
						<th>Vorname</th>
					<?php endif; ?>
					<?php if($config[0]['liste_rang'] == '1'): ?>			
						<th>Rang</th>
					<?php endif; ?>			
					<?php if($config[0]['liste_warteliste'] == '1'): ?>			
						<th>Warteliste</th>
					<?php endif; ?>			
					<?php if($config[0]['liste_bezahlt'] == '1'): ?>			
						<th>Bezahlt</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?
				$nsc = 0;
				$sc = 0;
				if ($data != '') {
						asort($data);
						foreach($data as $datas){
							if ($datas['rang'] == '1')
								$sc++;
							else 
								$nsc++;

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
									echo "<td><img src='xcms/views/images/icons/".$status_wl.".png' title='Warteliste' alt='Warteliste' /></td>";
								}
								if($config[0]['liste_bezahlt'] == '1') {
									echo "<td><img src='xcms/views/images/icons/".$status_bez.".png' title='Bezahlstatus' alt='Bezahlstatus' /></td>";
								}
							echo "</tr>";
						}
					}
			?>
			</tbody>
		</table>
	</div>
</div>




