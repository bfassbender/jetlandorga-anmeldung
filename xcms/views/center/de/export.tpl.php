<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>

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


<div style='margin: 0 0 20px 20px;'><a style='color: white; font-weight: bold' href='?action=admin'>&laquo; Zur&uuml;ck</a></div>
<div class='anmeldung' style='width: 798px'>
	<div class='heading_admin'><b>Exportieren</b></div>
	<br>
<?php if ($menu == true): ?>
		<div style='background-color: #82CFEF; border: 1px solid black; padding: 10px 10px 10px 150px; height: 190px;'>
			<ul>
				<a href='?action=export&cat=all'><div class='tmp' style='position: absolute; text-align:center' onMouseOver="textIn('Alle Daten<br>aller Teilnehmer, nur Stammdaten')"; onMouseOut="textOut()";><li><img src='xcms/views/images/1.png' border=0><span style="position:absolute;z-index:50;color:black;left:50px;font-size:16px">Alle</span></li></div></a>
				<a href='?action=export&cat=sc'><div class='tmp' style='position: absolute; margin-left: 155px; text-align:center' onMouseOver="textIn('Alle SC Daten')"; onMouseOut="textOut()";><li><img src='xcms/views/images/1.png' border=0><span style="position:absolute;z-index:50;color:black;left:50px;font-size:16px">SCs</span></li></div></a>
				<a href='?action=export&cat=nsc'><div class='tmp' style='position: absolute; margin-left: 310px; text-align:center' onMouseOver="textIn('Alle NSC Daten')"; onMouseOut="textOut()";><li><img src='xcms/views/images/1.png' border=0><span style="position:absolute;z-index:50;color:black;left:50px;font-size:16px">NSCs</span></li></div></a>
				<a href='?action=export&cat=archiv'><div class='tmp' style='position: absolute; margin-top: 95px; ; margin-left: 310px; text-align:center' onMouseOver="textIn('Alte Exporte')"; onMouseOut="textOut()";><li><img src='xcms/views/images/1.png' border=0><span style="position:absolute;z-index:50;color:black;left:50px;font-size:16px">Archiv</span></li></div></a>
			</ul>
		<div id='text' style='width: 140px; position: absolute; margin: 75px 0 0 175px; text-align: center; color: white; font-size: 14px; padding-top: 10px'></div>	
	</div>
<?php endif ?>	

<?php if ($archiv == true): ?>
	<ul>
		<?php if ($exports != '') foreach ($exports as $exporte): ?>
			<li><a href='exports/<?=$exporte;?>' style='color: white'><?php echo $exporte;?></a></li>	
		<?php endforeach ?>
	</ul>
<?php endif ?>

<?php if ($show_export == true): ?>
	<?php if ($status == '1'): ?>
		<?=$msg?>
		<ul><li><a href="exports/<?=$filename?>" style="color: white"><?=$filename?></a></li></ul>
	<?php else: ?>

	<?php endif; ?>
<?php endif; ?>
</div>

<? else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<? endif;?>
