<?
$ip = $_SERVER["REMOTE_ADDR"]; 
$now = time();

$q = mysql_query("SELECT UNIX_TIMESTAMP(time) as time FROM c5_counter WHERE ip = '".$ip."' ORDER BY time DESC LIMIT 1");
if($q != '')
	$data = mysql_fetch_row($q);
	
if ($data == '')
	mysql_query("INSERT INTO c5_counter SET ip = '".$ip."', time = now()"); 
else {
	$diff = date('i', ($now-$data[0]));
	if ($diff > '10' && $_SERVER['HTTP_REFERER'] != 'http://chroniken5.falkenberg-ev.de/')
		mysql_query("INSERT INTO c5_counter SET ip = '".$ip."', time = now()");
}	

?>
