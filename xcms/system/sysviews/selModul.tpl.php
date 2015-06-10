<?
$this->util = new util();
#$this->util->debug($file);
?>
<fieldset style='width:400px;padding:10px' class='input'>
	<legend><b>Modul w&auml;hlen</b></legend>
	<form action='<?php echo $_SERVER['PHP_SELF'];?>?.=selModul' method='post' enctype='text/html'>
	<input type='hidden' name='create' value='true' />
	<input type='hidden' name='page' value='<?php echo $page; ?>' />
		<b>Modul</b><br />
		<select name='modul'>
			<option value=''>Modul w&auml;hlen</option>
			<option value=''></option>
	<?php if(is_array($file)) foreach($file as $f): ?>
		<option value='<? echo $f;?>'><? echo substr($f, 0,-4);?></option>
	<?php endforeach; ?>
		</select><br /><br />
		<input type='submit' value='Modul eintragen' class='button' />
	</form>
</fieldset>



