<? print_r($db);?>

<?php if ($_SESSION['xcms']['login']['admin'] == true): ?>

<div style='margin: 0 0 20px 20px;'><a style='color: white; font-weight: bold' href='javascript:history.back(-1)'>&laquo; Zur&uuml;ck</a></div>
<div class='anmeldung' style='width: 798px'>
	<div class='heading_admin'><b>Char Export</b></div>
	<br>

	<table >
		<?php if ($exports != '') foreach ($exports as $e): ?>
			<tr><td><?php echo $e;?></td><td><input type='checkbox' name='name[]' value='<? echo $e;?>'></td></tr>	
		<?php endforeach ?>
	</table>

</div>

<? else: ?>
	<script>self.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?action=logmein'</script>
<? endif;?>
