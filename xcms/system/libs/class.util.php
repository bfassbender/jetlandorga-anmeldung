<?php

class Util {
	
	var $db;
	
	function Util() {	
		$this->db = new dbfunctions;		
	}

function createMail($email){
	$width = (strlen($email)*8);		
	$height = '13';
	$pic=ImageCreate($width, $height);
	$col1=ImageColorAllocate($pic,255,255,255);
	$col2=ImageColorAllocate($pic,8,35,18);
	ImageFilledRectangle($pic, 0, 0, $width, $height, $col2);
	#imagettftext($pic, 25,0,30,30, $col1, "static/arial.ttf", $email); 
	imagestring($pic, 3, 0,0, $email, $col1);
	#$email2 = ereg_replace('@', '', $email);
	#echo $email2 = ereg_replace('.', '', $tmp);
	
	
	ImageJPEG($pic, $_SERVER['DOCUMENT_ROOT']."/views/images/".$email."_image.jpg");
	chmod($_SERVER['DOCUMENT_ROOT']."/views/images/".$email."_image.jpg", 0777);
	ImageDestroy($pic);
		
	return("<img src='views/images/".$email."_image.jpg' alt='".$email."' />");
}

function createLink($link, $target='_blank'){
	$sub = substr($link, 0,4);
	$link2 = ($sub != 'http') ? 'http://'.$link : $link; 
	$rs = "<a href='".$link2."' target=".$target." style='color:white;font-weight:bold'>".$link."</a>";
	return ($rs);
}

############ BASE FUNCTIONS ############	

	function CheckValues($from, $type, $value) {
		$data = $this->db->dbCatchOne($from, $type, $type ."= '". $value ."'");
		return ($data) ? true : false;	
	}

	function _relocate($target1, $target2=''){
		if (!$target2) {
			echo "<script>self.location.href='?menu=".$target1."';</script>";
		} else {
			echo "<script>self.location.href='?menu=".$target1."/".$target2."';</script>";
		}		
		
	}
	
	function _toSession($data, $prefix){
    if (!$prefix){
  		foreach ($data as $key => $value) {
  			$_SESSION['xcms'][$key] = $value;
  		}
  	} else {
  		foreach ($data as $key => $value) {
  			$_SESSION['xcms'][$prefix][$key] = $value;
  		}    
    }
	}

  function _getSession(){
    foreach($_SESSION['xcms'] as $key => $value){
      $data[$key] = $value;
    }
    return($data);
  }
  	
	
	function idSecure($id){
		if(is_numeric($id)){
			return($id);
		} else {
			$this->setLayout('error');
			$_SESSION['msg'] = "Es ist ein Fehler mit der &uuml;bergebenen ID aufgetreten.";
			return ($data);	
		}
	}	
	
	function _toData($data){
		if (is_array($data)){
			foreach($data as $key => $value){
				$d[$key] = $this->_secure($value);
			}
		} else {
			$d = $this->_secure($data);
		}
		return($d);
	}
	
	function _fromData($data){
		foreach($data as $key => $value){
			$d[$key] = $this->_unsecure($value);
		}
		return($d);
  }

	function pwGenerator(){
		$zeichen = "qwertzupasdfghkyxcvbnm";
		$zeichen .= "123456789";
		$zeichen .= "WERTZUPLKJHGFDSAYXCVBNM";
		$zeichen .= ";";
		$password = '';
	
		srand((double)microtime()*1000000); 
	
		for($i = 0; $i < 6; $i++){
			$password .= substr($zeichen,(rand()%(strlen ($zeichen))), 1);
		}		
		return $password;
	}

	function _debug($data, $color='white'){
		echo "<pre style='background-color: ".$color." '>";
		print_r($data);
		echo "</pre>";
	}
	
	function _secure($data){
    	$data = addslashes($data);
    	return($data);
  	}
	
	function _unsecure($data){
    $data = stripslashes($data);
    return ($data);
  }
	
	function formString($data){
    $data = strtolower($data);
    $data = ereg_replace(' ', '-', $data);
    return($data);
  }
  
  function check_email_address($email) {
  	// First, we check that there's one @ symbol,
  	// and that the lengths are right.
  	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
  		// Email invalid because wrong number of characters
  		// in one section or wrong number of @ symbols.
  		return false;
  	}
  	// Split it into sections to make life easier
  	$email_array = explode("@", $email);
  	$local_array = explode(".", $email_array[0]);
  	for ($i = 0; $i < sizeof($local_array); $i++) {
  		if
  		(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
  				↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
  				$local_array[$i])) {
  			return false;
  		}
  	}
  	// Check if domain is IP. If not,
  	// it should be valid domain name
  	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
  		$domain_array = explode(".", $email_array[1]);
  		if (sizeof($domain_array) < 2) {
  			return false; // Not enough parts to domain
  		}
  		for ($i = 0; $i < sizeof($domain_array); $i++) {
  			if
  			(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
  					↪([A-Za-z0-9]+))$",
  					$domain_array[$i])) {
  				return false;
  			}
  		}
  	}
  	return true;
  }
}
?>
