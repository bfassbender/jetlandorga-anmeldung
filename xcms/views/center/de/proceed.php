<?
include('../../libs/_config.php');
$id = $_POST['id'];
$action = $_POST['action'];

if(mysql_query("UPDATE c5_member SET bezahlt = IF(bezahlt = '1', '0', '1') WHERE id = '".$id."'")){
	
} else {
	return false;
}
die();

?>