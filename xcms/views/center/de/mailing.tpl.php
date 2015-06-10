<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>
<style>
	table {
		margin: 20px 0 20px 0 !important;
		padding: 0 5px;
		font: 12px "Lucida Grande", Helvetica, Verdana, Arial;
		color: white;
	}
</style>

<script language='javascript'>
	$(document).ready(function(){
		 $('#add').click(function(){
			if($('#receiver').css('display') == 'block')
				$('#receiver').hide('fast');
			else
				$('#receiver').show('fast');
		});
	});	    

	function checkmyboxes(id) {
		//$('form[name="mailing"] *').filter(':checkbox').each(function(){
		//	$(this).prop("checked", false);
		//});
		if($("#"+id).is(":checked")){
			console.log();
	    	$('input[id^="mail_'+id+'_"]').each(function(){
				$(this).prop("checked", true);
			});
	    } else {
	    	$('input[id^="mail_'+id+'_"]').each(function(){
				$(this).prop("checked", false);
			});
	    }
		
	}
	
	function checkSubmitForm(){
		var error = false;
		var error_message = "Bitte korrigieren Sie Ihre Eingaben:\n\n";
	
		if($('#title').val() == ''){
			error = true;
  			error_message += "- Es wurde kein Titel eingetragen.\n";
		}
		if($('#text').val() == ''){
			error = true;
  			error_message += "- Es wurde kein Text eingetragen.\n";
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
		<div class='heading_admin'><b>Mailing</b></div>
		<br>
		<form action='?action=sendMassmail' method='post' enctype='multipart/form-data' name="mailing"  onsubmit="return checkSubmitForm();">
		<fieldset >
			<lable style='font-size: 14px'><b>Betreff: </b></lable><br>
			<input style='margin-left: 20px' id='title' type="text" name="title" value="<? echo $title?>" size='40'><br><br>
			<lable style='font-size: 14px'><b>Empf&auml;nger: </b></lable><img src='/xcms/views/images/icons/add.png' id='add'><br>
			
			<div style='display: block' id='receiver'>
				<table id="teilnehmer" cellspacing="2" cellpadding=0 style='width: 750px'>

					<tr>
					<td style='text-align: center;border: 1px dashed lightgrey; color: white'>Vorname</td>
					<td style='text-align: center;border: 1px dashed lightgrey; color: white'>Nachname</td>
					<td style='text-align: center;border: 1px dashed lightgrey; color: white'>Email</td>
					<td style='text-align: center;border: 1px dashed lightgrey; color: white'>Bezahlt</td>
					<td style='text-align: center;border: 1px dashed lightgrey; color: white'><b>all</b></td>
					<td style='text-align: center;border: 1px dashed lightgrey; color: white'><b><img src='xcms/views/images/icons/power_on.png'></b></td>
					<td style='text-align: center;border: 1px dashed lightgrey; color: white'><b><img src='xcms/views/images/icons/power_off.png'></b></td>
				</tr>
				<?
					if ($users != ''){
						foreach ($users as $datas) {
							$status  = ($datas['bezahlt'] == '1') ? 'power_on' : 'power_off';
							echo "
								<tr>
									<td style='padding-left: 10px;border: 1px dashed lightgrey; color: white'>".$datas['vorname']."</td>
									<td style='padding-left: 10px;border: 1px dashed lightgrey; color: white'>".$datas['nachname']."</td>
									<td style='padding-left: 10px;border: 1px dashed lightgrey; color: white'>".$datas['email']."</td>
									<td style='border: 1px dashed lightgrey; text-align: center'><img src='xcms/views/images/icons/".$status.".png' border='0'></td>
									<td style='border: 1px dashed lightgrey; text-align: center'><input id='mail_all_".$datas['id']."' name='mail[".$datas['id']."]' type='checkbox' value='0'></td>
							";
							if ($datas['bezahlt'] == '1')
								echo "<td style='border: 1px dashed lightgrey; text-align: center'><input id='mail_on_".$datas['id']."' name='mail[".$datas['id']."]' type='checkbox' value='0'></td>";
							else 
								echo "<td style='border: 1px dashed lightgrey; text-align: center; background-color: #66797F'>&nbsp;</td>";
							if ($datas['bezahlt'] == '0')
								echo "<td style='border: 1px dashed lightgrey; text-align: center'><input id='mail_off_".$datas['id']."' name='mail[".$datas['id']."]' type='checkbox' value='0'></td>";
							else 
								echo "<td style='border: 1px dashed lightgrey; text-align: center; background-color: #66797F'>&nbsp;</td>";
							echo "
								</tr>								
							";
						}
					}
					
				?>
					<tr>
						<td colspan=4></td>
						<td style='text-align: center;border: 1px dashed lightgrey; '><input name='check_all' onchange="checkmyboxes(this.id)" id="all" type='checkbox' value=''></td>
						<td style='text-align: center;border: 1px dashed lightgrey; '><input name='check_on' onchange="checkmyboxes(this.id)"  id='on' type='checkbox' value=''></td>
						<td style='text-align: center;border: 1px dashed lightgrey; '><input name='check_off' onchange="checkmyboxes(this.id)" id='off' type='checkbox' value=''></td>
					</tr>
				</table>	
			</div><br>
			<lable style='font-size: 14px'><b>Mailtext</b></lable><br />
			<textarea id='text' style='margin-left: 20px' name="text" rows="14" cols="55"><? echo $text?></textarea><br><br>
			<div style='margin-left: 200px; margin-top: 10px'>
				<input type='submit' value='absenden' style='color: black; background-color: white; border: 1px sold #3391ce;'>
			</div>
		</fieldset>
		</form>		
	</div>
<? else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<? endif;?>