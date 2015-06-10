<?
$this->util = new util();
#debug($galeries);
?>
<fieldset style='width:400px;padding:10px' class='input'>
	<legend><b>Neue Seite erstellen</b></legend>
	<form action='<?php echo $_SERVER['PHP_SELF'];?>?.=newPage' method='post' enctype='text/html'>
	<input type='hidden' name='create' value='true' />
		<b>Dateiname:</b><br />
		<input type='text' name='name' size='40' /><b>.tpl.php</b><br /><br />
		<b>Seitenart:</b><br />
		<input type='radio' name='seitenart' value='plain' checked /> - leere Seite<br />
		<input type='radio' name='seitenart' value='text' /> - Text Seite<br />
		<input type='radio' name='seitenart' value='modul' /> - Modul Seite<br />
		<input type='radio' name='seitenart' value='interactive' /> - Interactive Seite *<br /><br />
		<input type='submit' value='Seite erstellen' class='button' />
	</form>
</fieldset>
<div id='klein'>*(f&uuml;r diese Seite sind Programmiert&auml;tigkeiten notwenig)</div>


