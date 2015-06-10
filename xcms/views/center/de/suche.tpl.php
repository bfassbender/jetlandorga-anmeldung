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
	
</style>
<div style='margin: 0 0 20px 20px;'><a style='color: white; font-weight: bold' href='?action=admin'>&laquo; Zur&uuml;ck</a></div>
	<div class='anmeldung' style='width: 798px'>
		<div class='heading_admin' ><b>Teilnehmer suchen</b></div>
		<br><br>
		
	<form action='<?echo $_SERVER['PHP_SELF']?>?action=suche' method='post' enctype='text/html'>
		<input type="hidden" name="search" value="true">
		<div style='padding-left: 200px'>
			<input type="text" name="string" value="" size='50'>
			<input type="submit" value="Suchen"><br />
			<span style='font-size: 10px'>(Bitte Nachnamen eingeben)</span>
		</div>
	</form>
	<br />
	<?php if ($search == true): ?>	
		<?php if ($nohit == true): ?>
			<br />
			<div style='text-align:center'>
				<?echo $nohit_msg;?>
			</div>
		<?php else: ?>
			<div style='text-align:center'>F&uuml;r den Nachname: <b><?php echo $string;?></b> wurden <i><?php echo $count;?></i> Ergebnisse gefunden</div>
			<div style='border: 1px solid #ddd; padding: 10px 10px 10px 10px; width: 778px; background-color: #5C6D73;'>
  				<table cellspacing="0" width="778">
				<tr>
					<th class='tbl_head' style='width: 150px'>Vorname</th>
					<th class='tbl_head' style='width: 150px'>Nachname</th>
					<th class='tbl_head'>Rang</th>
					<th class='tbl_head'>Status</th>
				</tr>
							<tr><td colspan='4' style='border: none; border-bottom: 1px solid black; background-color: #5C6D73;'></td></tR>	
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
						<td class='cell'><a href='<?php echo $_SERVER['PHP_SELF']?>?action=edit&id=<?php echo $results['id'];?>'><?php echo $results['vorname'];?></a></td>
						<td class='cell'><a href='<?php echo $_SERVER['PHP_SELF']?>?action=edit&id=<?php echo $results['id'];?>'><?php echo $results['nachname'];?></a></td>
						<td class='cell' style='text-align:center; width: 50px'><b><?php echo $results['rang'];?></b></td>
						<td class='cell' style='text-align: center;width: 40px'><dd name='<?php echo $results['id'];?>' style='margin-left: 0px'><span id='status_<?php echo $results['id'];?>'><img src='xcms/views/images/icons/<?php echo $status;?>.png' border=0  title='Status &auml;ndern'></span></dd></td>
					</tr>
				<?php endforeach ?>
				
				</table>
			</div>
		<?php endif ?>		
	<?php endif ?>		
	</div>
<? else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<? endif;?>	

