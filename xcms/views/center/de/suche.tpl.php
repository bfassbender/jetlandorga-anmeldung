<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>
<script>
$(document).ready(function(){
	$('dd').click(function(){
		var id = $(this).attr('name');
		$.ajax({
   			type: "POST",
   			url: "?action=change",
   			data: {id: id},
   			success: function(msg){
				$('#status_'+id).html(msg);
			},
   			error: function(){
   				alert('Ein Fehler ist aufgetreten.');
			}
		});
	});
});
</script>


<div class="row">
	<b><a href='?action=admin'>&laquo; Zur&uuml;ck</a></b>
</div>
<div class="row">
	<h1>Teilnehmer suchen</h1>
	<form role="form" action='<?echo $_SERVER['PHP_SELF']?>?action=suche' method='post' enctype='text/html'>
		<input type="hidden" name="search" value="true">		
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" class="form-control" placeholder="Bitte Namen eingeben" name='string' value='' maxlength='50' required />
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
							<th>Status</th>
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
									$status = ($results['bezahlt'] == '0') ? 'power_off' : 'power_on'; 
							?>
							<tr>
								<td><a href='<?php echo $_SERVER['PHP_SELF']?>?action=edit&id=<?php echo $results['id'];?>'><?php echo $results['vorname'];?></a></td>
								<td><a href='<?php echo $_SERVER['PHP_SELF']?>?action=edit&id=<?php echo $results['id'];?>'><?php echo $results['nachname'];?></a></td>
								<td><b><?php echo strtoupper($results['rang']);?></b></td>
								<td><dd name='<?php echo $results['id'];?>' style='margin-left: 0px'><span id='status_<?php echo $results['id'];?>'><img src='xcms/views/images/icons/<?php echo $status;?>.png' border=0  title='Status &auml;ndern'></span></dd></td>
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

