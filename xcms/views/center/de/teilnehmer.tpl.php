<?
$scAnm = $c['sc'];
$scRest = ($config[0]['sc_anz']-$scAnm);
$scBan = ($scRest <= '0') ? true : false;
$nscAnm = $c['nsc'];
$nscRest = ($config[0]['nsc_anz']-$nscAnm);
$nscBan = ($nscRest <= '0') ? true : false;
?>

<script>

function getTextExtractor()
{
  return (function() {
    var patternLetters = /[öäüÖÄÜáàâéèêúùûóòôÁÀÂÉÈÊÚÙÛÓÒÔß]/g;
    var patternDateDmy = /^(?:\D+)?(\d{1,2})\.(\d{1,2})\.(\d{2,4})$/;
    var lookupLetters = {
      "ä": "a0", "ö": "o0", "ü": "u0",
      "Ä": "A0", "Ö": "O0", "Ü": "U0",
      "á": "a0", "à": "a0", "â": "a0",
      "é": "e0", "è": "e0", "ê": "e0",
      "ú": "u0", "ù": "u0", "û": "u0",
      "ó": "o0", "ò": "o0", "ô": "o0",
      "Á": "A0", "À": "A0", "Â": "A0",
      "É": "E0", "È": "E0", "Ê": "E0",
      "Ú": "U0", "Ù": "U0", "Û": "U0",
      "Ó": "O0", "Ò": "O0", "Ô": "O0",
      "ß": "s0"
    };
    var letterTranslator = function(match) { 
      return lookupLetters[match] || match;
    }

    return function(node) {
      var text = $.trim($(node).text());
      var date = text.match(patternDateDmy);
      if (date)
        return [date[3], date[2], date[1]].join("-");
      else
        return text.replace(patternLetters, letterTranslator);
    }
  })();
}


$(document).ready(function(){
	$(function(){
		$("#teilnehmer").tablesorter({
			theme : "bootstrap",
			headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
			sortList : [[0,0], [1,0]],
			widgets : ["uitheme"],
			cancelSelection: true,
			widthFixed: true,
			headers: { 
			            0: { sorter: false },
			            1: { sorter: false },
			            2: { sorter: false },
			            3: { sorter: false },
			            4: { sorter: false }, 
			        },
		    textExtraction: getTextExtractor(),
			
		});
	});
});
</script>

<div class='container'>
	<h1>Anmeldestatus</h1>
	<?php if($config[0]['stats'] == '1'): ?>
	<div>
		<ul>
			<li style='margin-left: 20px'>Es sind <b><? echo $scAnm; ?></b> von <b><?echo $config[0]['sc_anz']; ?></b> Plätzen für <b>SCs</b> vergeben.</li>
			<li style='margin-left: 20px'>Es sind <b><? echo $nscAnm ?></b> von <b><?echo $config[0]['nsc_anz']; ?></b> Plätzen für <b>NSCs</b> vergeben.</li>
			<li style='margin-left: 20px'>Aufgrund von Privatsph&auml;re Einstellungen wird hier eventuell nicht jeder Teilnehmer gelistet</li>
		</ul>
	</div>
	<?php endif; ?>
	<?php if(strlen($config[0]['anmeldung_infotext']) > 0):?>
	<div class="row">
		<h3 class="text-warning table-background" style="margin-top: 10px; padding: 15px;"><b><?php echo $config[0]['anmeldung_infotext']?></b></h3>
	</div>
	<?php endif; ?>
	<div class="table-background table-responsive">
		<table id="teilnehmer" class="table table-striped table-hover">
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

							$status_wl  = ($datas['warteliste'] == '1') ? 'glyphicon glyphicon-exclamation-sign text-warning' : '';
							$status_bez  = ($datas['bezahlt'] == '1') ? 'glyphicon glyphicon-ok text-success' : 'glyphicon glyphicon-remove text-danger';

							echo "<tr>";
								if($config[0]['liste_nachname'] == '1') {
									echo "<td>".ucfirst($datas['nachname'])."</td>";
								}
								if($config[0]['liste_vorname'] == '1') {
									echo "<td>".ucfirst($datas['vorname'])."</td>";
								}
								if($config[0]['liste_rang'] == '1') {
									echo "<td>".strtoupper($datas['rang'])."</td>";
								}
								if($config[0]['liste_warteliste'] == '1') {
									echo "<td><span class='".$status_wl."' aria-hidden='false'></span></td>";
								}
								if($config[0]['liste_bezahlt'] == '1') {
									echo "<td><span class='".$status_bez."' aria-hidden='false'></span></td>";
								}
							echo "</tr>";
						}
					}
			?>
			</tbody>
		</table>
</div>




