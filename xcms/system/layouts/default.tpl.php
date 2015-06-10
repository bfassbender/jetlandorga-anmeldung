<? #include($_SERVER['DOCUMENT_ROOT'].'/libs/counter.php');?>
<?
#echo "<pre style='color: white'>";
#echo $_SERVER['HTTP_USER_AGENT'];



?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
	<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='de' lang='de'>
	<head>
		<title>Chroniken VI - 2013 || Falkenberg-ev</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?
if (strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE')){
	echo "<link rel=\"stylesheet\" href=\"views/css/style_ie.css\" type=\"text/css\" media=\"screen, projection\">";
} else {
	echo "<link rel=\"stylesheet\" href=\"views/css/style_ff.css\" type=\"text/css\" media=\"screen, projection\">";
}
?>		
		<link rel="stylesheet" href="views/css/countdown.css" type="text/css" media="screen, projection">

		<script type="text/javascript" src="system/libs/js/jquery.js"></script>
		<script type="text/javascript" src="system/libs/js/jquery.countdown.js"></script>	
		<script type="text/javascript" src="system/libs/js/jquery.countdown-de.js"></script>
		<script type="text/javascript" src="system/libs/js/jquery.tablesorter.js"></script>
		<style>
			@media print {
				#divPrint {display: block}
				#divNoPrint {display: none}
			}
		</style>
	</head>
	<body>
		<script type="text/javascript" src="libs/js/wz_tooltip.js"></script>		
		<div id='wrapper'>
			<div id='header'>
				<?php $this->element(ELEMENTS.DS.'header.elm.php')?>
			</div>
			<div style='position: absolute; left: 10px; top: 53px; z-index: 99' id='divNoPrint'>		
				<?php $this->element(ELEMENTS.DS.'menu.elm.php')?>
			</div>
			<div class='container'>
				<?php echo $content;?>
			</div>
			<div id='footer'>
				<?php $this->element(ELEMENTS.DS.'footer.elm.php')?>
			</div>
		</div>
	</body>
</html>

