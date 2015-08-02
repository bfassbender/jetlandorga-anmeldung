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
  		if(mysql_select_db($database)) {
			mysql_query("SET NAMES 'utf8'", $link);
			mysql_set_charset('utf8',$link);
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
		else { 
			return false;
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
				$sql .=  $key ."='".$value."'";
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
				if ($i != 0) {
					$sql .= ", ";
				}
				$sql .=  $key ."='".$value."'";

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
}
?>
