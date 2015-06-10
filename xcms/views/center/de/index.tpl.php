

<?
/*
		echo "<pre style='background-color: white'>";
		print_r($pagination);
		echo "</pre>";
*/
?>
<script type="text/javascript">
$(function () {
	var austDay = new Date();
	//austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	austDay =  new Date("Oct 5, 2013 15:00:00");
	$('#defaultCountdown').countdown({until: austDay, format: 'dHm', timezone: +1});
});
</script>

<?php 
//<div style='font-weight:bold;color:white;font-size:14px'>Chroniken Countdown:</div><br />
//<div style='height:30px; width: 40px; background-color: #A4C3CC; position: absolute; font-weight:bold;padding: 10px 0 0 10px; border: 1px solid #000000'> Noch </div>
//<div style='height:40px; width: 140px; margin-left:50px; position: relative' id="defaultCountdown"></div>
//<div style='height:30px; width: 125px; margin-left:191px; margin-top: -42px; background-color: #A4C3CC; border: 1px solid #000000; font-weight:bold;padding: 10px 0 0 10px; position: relative'> bis zum Chroniken VI</div>
?>
<br /><br />
<?php if(is_array($news)) foreach ($news as $data): ?>
	<div class='anmeldung' style='width: 778px; text-align:left'>	
		<div style='font-weight: bold; font-size: 20px; color: #FFFFFF;'><?php echo $data['title']?></div>
		<div>von <?php echo $data['autor']?> || <?php echo date('d.m.Y - H:i', strtotime($data['date']));?> Uhr</div>
		<br>
		<div class='news' style=''><?php echo $data['newstext']?></div>
	</div>
	<br>
<?php endforeach ?>
<div style='text-align: right; color: white'>(<?php echo $pagination['maxcount'];?> Nachrichten insgesamt)</div>
<form action='<?php echo $_SERVER['PHP_SELF'];?>' method='post' enctype='text/html'>
	<div style='color: white'>
		<b>&laquo;</b>
<?php for($i=1; $i <= $pagination['maxpage']; $i++) : ?>
	
	<?php if ($i == ($pagination['page'])): ?>
		<input type='button' value='<?php echo $i;?>' style='font-size: 10px; padding: 1px 3px 1px 3px; border: 1px solid black; background-color: #82CFEF; color: black'>
	<?php else: ?>
		<input type='submit' name='submit' value='<?php echo $i;?>' style='font-size: 10px; padding: 1px 3px 1px 3px; border: 1px solid black; background-color: white; color: black; font-weight: bold'>
	<?php endif ?>
<? endfor; ?>
		<b>&raquo;</b>
	</div>
</form>	
