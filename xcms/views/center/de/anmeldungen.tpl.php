<?php
	$scRest = ($config[0]['sc_anz']-$c['sc']);
	$scBan = ($scRest <= '0') ? true : false;
	$nscRest = ($config[0]['nsc_anz']-$c['nsc']);
	$nscBan = ($nscRest <= '0') ? true : false;
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
	<div class="row">
		<h3 class="text-warning table-background" style="margin-top: 10px; padding: 15px;"><b>Leider können wir momentan keine Anmeldungen mehr annehmen, weil mehr Anmeldungen bei uns eingegangen sind, als wir Plätze haben.</h3>
	</div>
</div>