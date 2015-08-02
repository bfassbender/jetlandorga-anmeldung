<?php
class Dbfunctions {

	function Dbfunctions () {
		global $loc;
		if (!$loc) {
			include('variables.php');
		}
	}
	
	function dbOn(){
		global $loc, $user, $pass, $database;

		$link = mysql_connect($loc, $user, $pass);
  		if (!$link) {
    		die("Could not connect: " . mysql_error() . "<br />\n");
  		}
		mysql_query("SET NAMES utf8"); 
  		if(mysql_select_db($database)) {
			return true;
		} else {
			return false;
		}
	}

	function dbOff(){
		mysql_close();
	}	
	
	function dbDelete($from, $where){	
		$sql = "DELETE FROM ".PREFIX."".$from." WHERE ".$where.";";	
		if (mysql_query($sql) or die(mysql_error())){
			return true;
		} else {
			return false;
		}
	}

	function dbCatchAll($from, $select, $where = "", $order = "", $limit = ""){		
		$sql = "SELECT ".$select." FROM ".PREFIX."".$from."";
		
		
		if ($where != ''){
			$sql .= " WHERE ".$where."";
		}
		if ($order != ''){
			$sql .= " ORDER BY ".$order."";
		}
		if ($limit != ''){
			$sql .= " LIMIT ".$limit."";
		}	
		$sql .= ";";
		
		if($query = mysql_query($sql) or die(mysql_error())){
			while($res = mysql_fetch_array($query, MYSQL_ASSOC)){
				$result[] = $res;
			}	
		}
		else { return false;
		}
		return $result;
	}
	
	function dbCatchOne($from, $select, $where = "", $order=""){		
		$sql = "SELECT ".$select." FROM ".PREFIX."".$from."";
		
		
		if ($where != ''){
			$sql .= " WHERE ".$where."";
		}
		if ($order != ''){
			$sql .= " ORDER BY ".$order."";
		}
		$sql .= ";";
		
		if($query = mysql_query($sql) or die(mysql_error())){
			$res = mysql_fetch_row($query);
		}
		else { return false; }
		return $res[0];
	}
		
	
	function query($select){
		$sql = $select;
		
		if($query = mysql_query($sql) or die(mysql_error())){
			while($res = mysql_fetch_array($query, MYSQL_ASSOC)){
				$result[] = $res;
			}	
		}
		else { return false;
		}
		return $result;
	}
	

	function dbCount($from, $where){
		$sql = "SELECT count(*) as files FROM ".PREFIX."".$from."";
		if ($where != ''){
			$sql .= " WHERE ".$where."";
		}
		$sql .= ";";
	
		if($query = mysql_query($sql) or die(mysql_error())){
			while($res = mysql_fetch_array($query, MYSQL_ASSOC)){
				$result[] = $res;
			}	
		}
		return($result[0]['files']);
	}
	
	function dbUpdate($from, $data, $where){
		$sql = "UPDATE ".PREFIX."".$from." SET ";
		$i=0;
		if (is_array($data)){
			foreach($data as $key => $value){			
				if ($i != 0) {$sql .= ", ";}
				$sql .=  $this->_secure($key) ."='".$this->_exchange($value)."'";
				$i++;
			}
		} else {
			$sql .= $data;
		}
		$sql .= " WHERE ".$where.";";
		
		if (mysql_query($sql)or die (mysql_error())){
			return true;
		} else { return false; }			
	}
	
	
	
	function dbInsert($from, $data){
		$sql = "INSERT INTO ".PREFIX."".$from." SET ";
		$i=0;
		if (is_array($data)){
			foreach($data as $key => $value){			
				if ($i != 0) {$sql .= ", ";}
				$sql .=  $this->_secure($key) ."='".$this->_exchange($value)."'";
				$i++;
			}
		} else {
			$sql .= " ".$data;
		}
		$sql .= ";";
		
		if (mysql_query($sql) or die(mysql_error())){
			$id =  mysql_insert_id();
			if ($id != '0')	
				return($id);
			else 
				return true;
		} else { return false; }	
	}
	
	function _secure($data)
	{
		return(addslashes($data));
	}
	
	function _exchange ($data){

		if (is_array($data)){
			foreach ($data as $datas) {
				$datas = ereg_replace('ä', '&auml;', $datas);
				$datas = ereg_replace('ö', '&ouml;', $datas);
				$datas = ereg_replace('ü', '&uuml;', $datas);
				$datas = ereg_replace('Ä', '&Auml;', $datas);
				$datas = ereg_replace('Ö', '&Ouml;', $datas);
				$datas = ereg_replace('Ü', '&Uuml;', $datas);
				$datas = ereg_replace('/<p/', "<span", $datas);
				$datas = ereg_replace('</p>', '</span>', $datas);
				$datas = ereg_replace('ß', '&szlig;', $datas);
				$datas = ereg_replace('<br>', '<br />', $datas);
				$datas = ereg_replace('\'', '', $datas);
				$datas = ereg_replace('<<', '&lt;<', $datas);
				$datas = ereg_replace('>>', '>&gt;', $datas);
				$datas = ereg_replace('<hr>', '<hr />', $datas);
			}
		} else {
			$data = ereg_replace('ä', '&auml;', $data);
			$data = ereg_replace('ö', '&ouml;', $data);
			$data = ereg_replace('ü', '&uuml;', $data);
			$data = ereg_replace('Ä', '&Auml;', $data);
			$data = ereg_replace('Ö', '&Ouml;', $data);
			$data = ereg_replace('Ü', '&Uuml;', $data);
			$data = ereg_replace('/<p/', "<span", $data);
			$data = ereg_replace('</p>', '</span>', $data);
			$data = ereg_replace('ß', '&szlig;', $data);
			$data = ereg_replace('<br>', '<br />', $data);
			$data = ereg_replace('\'', '', $data);
			$data = ereg_replace('<<', '&lt;<', $data);
			$data = ereg_replace('>>', '>&gt;', $data);			
			$data = ereg_replace('<hr>', '<hr />', $data);
						
		}
		return($data);
	}
}
?>
