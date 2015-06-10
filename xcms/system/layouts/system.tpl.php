<?

echo "<pre>";
#print_r($_SESSION);
echo "</pre>";

?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
	<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='de' lang='de'>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="views/css/system.css" type="text/css" media="screen, projection">
<script type="text/javascript">
	function openwindow (url) {
	 openwindow = window.open(url, "", "width=600,height=400,status=yes,scrollbars=yes,resizable=yes");
	 openwindow.focus();
	}
</script>		
</head>
<body>
	<div>
		<?php echo $content;?>
	</div>
</body>
