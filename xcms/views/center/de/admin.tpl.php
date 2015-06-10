<?
/*
echo "<pre>";
print_r($c);
echo "</pre>";
*/
?>

<style>

</style>

<script>
	function textIn(txt){
		$('#text').html('<b>'+txt+'</b>');
	}
	
	function textOut(){
		$('#text').html('');
	}
</script>
<style>
.tmp{
	padding: 5px 0 5px 0;
	background-color: white;
	border: 1px solid black;
	background-color: #F2FAFD;
	font-weight: bold;
	font-size: 12px;
	width: 140px;
	height: 70px;
	list-style-type: none;
}	
</style>

<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>
<div class='anmeldung' style='width: 798px'>
		<div class='heading_admin'><b>Adminbereich</b></div>
		<br>
	<div style='background-color: #82CFEF; border: 1px solid black; padding: 10px 10px 10px 150px; height: 290px;'>
		<ul>
			<a href='?action=suche'><div class='tmp' style='position: absolute; text-align:center' onMouseOver="textIn('Teilnehmersuche')"; onMouseOut="textOut()";><li><img src='xcms/views/images/suche.png' border=0></li></div></a>
			<a href='?action=overview'><div class='tmp' style='position: absolute; margin-left: 155px; text-align:center' onMouseOver="textIn('&Uuml;bersicht')"; onMouseOut="textOut()";><li><img src='xcms/views/images/overview.png' border=0></li></div></a>
			<a href='?action=config'><div class='tmp' style='position: absolute; margin: 95px 0 0 0; text-align:center' onMouseOver="textIn('Config')"; onMouseOut="textOut()";><li><img src='xcms/views/images/own.png' border=0></li></div></a>
			<a href='?action=mailing'><div class='tmp' style='position: absolute; margin-left: 310px; text-align:center' onMouseOver="textIn('Mailing')"; onMouseOut="textOut()";><li><img src='xcms/views/images/mailing.png' border=0></li></div></a>
			<a href='?action=export'><div class='tmp' style='position: absolute;  margin: 95px 0 0 310px; text-align:center' onMouseOver="textIn('Excel Export')"; onMouseOut="textOut()";><li><img src='xcms/views/images/export.png' border=0></li></div></a>
	<div id='text' style='width: 140px; position: absolute; margin: 95px 0 0 175px; text-align: center; color: white; font-size: 14px; padding-top: 30px'></div>
		
	</div>
	<br />
	<div style='background-color: #82CFEF; border: 1px solid black; padding: 10px 10px 10px 30px; height: 200px; color: black'>
	<b>Statistik:</b><br />
		<table style='border:1px solid #5C6D73;padding:10px'>
			<tr>
				<td></td>
				<td>SC</td>
				<td>NSC</td>
				<td>SC<br />WL</td>
				<td>NSC<br />WL</td>
				<td>Gelöscht</td>				
			</tr>
			<tr style='height:20px;font-weight:bold'>
				<td style='padding: 0 10px 0 0'>Teilnehmer:</td>
				<td style='padding: 0 20px 0 20px; border:1px solid #5C6D73;background-color:white'><?=$sc?></td>
				<td style='padding: 0 20px 0 20px; border:1px solid #5C6D73;background-color:white'><?=$nsc?></td>
				<td style='padding: 0 20px 0 20px; border:1px solid #5C6D73;background-color:white'><?=$sc_wl?></td>
				<td style='padding: 0 20px 0 20px; border:1px solid #5C6D73;background-color:white'><?=$nsc_wl?></td>
				<td style='padding: 0 20px 0 20px; border:1px solid #5C6D73;background-color:white'><?=$deleted?></td>
			</tr>
		</table>
	</div>
</div>
	



	
<? else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<? endif;?>
