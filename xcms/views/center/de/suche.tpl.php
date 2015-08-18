<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>
<script>
$(document).ready(function(){
	$('input[name=string]').focus();
});
	 
function changeStatus(id) {
 	$.ajax({
		type: 'POST',
		url: '?action=change', 
		data: {id: id}, 
		success: function (data) {
	  		$("#info").show('slow');
	  		$("#info").animate({opacity: 1.0}, 1000)
	  		$("#info").html('<b>Der Status wurde aktualisiert.</b>');
	  		$("#info").hide('fast');
	  		$("#status_"+id).html(data);
	}});				
 }

	function changeList(id) {
	$.ajax({
  			type: "POST",
  			url: "?action=changeListe",
  			data: {id: id},
  			success: function(msg){
			$('#liste_'+id).html(msg);
	  		$("#info").show('slow');
	  		$("#info").animate({opacity: 1.0}, 1000)
	  		$("#info").html('<b>Der Status der Warteliste wurde aktualisiert.</b>');
	  		$("#info").hide('fast');	
		},
  			error: function(){
  				alert('Ein Fehler ist aufgetreten.');
		}
	});
	if (action == 'show'){
		$('#disp').css('width', '400px');
	} else {
		$('#disp').css('width', '600px');
	}
	$('#disp').show('fast');
}

</script>


<div class="row">
	<b><a href='?action=admin'>&laquo; Zur&uuml;ck</a></b>
</div>
<div id="info" style="color: white; z-index: 99; position: absolute; background-color: green; border: black 1px solid; width: 300px;  padding: 10px; margin-left: 250px; display: none; text-align:center"></div>
<div class="row">
	<h1>Teilnehmer suchen</h1>
	<form role="form" action='<?echo $_SERVER['PHP_SELF']?>?action=suche' method='post' enctype='text/html'>
		<input type="hidden" name="search" value="true">		
		<div class="form-group">
			<div class="col-sm-4">
				<input autofocus type="text" class="form-control" placeholder="Bitte Namen eingeben" name='string' value='' maxlength='50' required />
			</div>
			<div class="col-sm-2">
		   	<button class="btn btn-primary" type="submit">Suchen</button>
			</div>
		</div>
	</form>
</div>
<div class="row">
	<?php if ($search == true): ?>	
		<?php if ($nohit == true): ?>
			<br/>
			<div class="text-danger"><?echo $nohit_msg;?></div>
			<br/>
		<?php else: ?>
			<br/>
			<div class="text-success">F&uuml;r den Nachname: <b><?php echo $string;?></b> wurden <i><?php echo $count;?></i> Ergebnisse gefunden</div>
			<br/>
			<div class="table-background table-responsive">
				<table id="teilnehmer" class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Vorname</th>		
							<th>Nachname</th>
							<th>Rang</th>
							<th>Bezahlt</th>
							<th>Warteliste</th>							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($result as $results): ?>
							<?
									switch($results['rang']){
										case '0': $results['rang'] = 'Crew'; break;
										case '1': $results['rang'] = 'SC'; break;
										case '2': $results['rang'] = 'NSC'; break;							
									}
									$status_wl  = ($results['warteliste'] == '1') ? 'glyphicon glyphicon-ok text-success' : 'glyphicon glyphicon-remove text-danger';
									$status_bez  = ($results['bezahlt'] == '1') ? 'glyphicon glyphicon-ok text-success' : 'glyphicon glyphicon-remove text-danger';
							?>
							<tr>
								<td><a href='<?php echo $_SERVER['PHP_SELF']?>?action=edit&id=<?php echo $results['id'];?>'><?php echo $results['vorname'];?></a></td>
								<td><a href='<?php echo $_SERVER['PHP_SELF']?>?action=edit&id=<?php echo $results['id'];?>'><?php echo $results['nachname'];?></a></td>
								<td><b><?php echo strtoupper($results['rang']);?></b></td>
								<td class='cell' style='text-align: center;margin-left: 0px;cursor:pointer' onclick="changeStatus('<?=$results['id']?>')" id="status_<?=$results['id']?>"><span class='<?php echo $status_bez; ?>' aria-hidden='false'></td>
								<td class='cell' style='text-align: center;margin-left: 0px;cursor:pointer' onclick="changeList('<?=$results['id']?>')" id="liste_<?=$results['id']?>"><span class='<?php echo $status_wl; ?>' aria-hidden='false'></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		<?php endif ?>		
	<?php endif ?>
	</div>
<? else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<? endif;?>	

