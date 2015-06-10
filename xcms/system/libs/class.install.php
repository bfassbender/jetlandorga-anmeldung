
<?php
include('class.dbfunctions.php');

class Install {

	var $step;
	var $db;

	function Install() {
		$this->db = new dbfunctions();
	}
	
	function listener ($step) {
		switch ($step) {
			case '1': $this->writeConfig();
				break;
			case '2': $this->checkDbExists();
				break;
			case '0':
			default: $this->checkConfig();
		}
	}

	function step0() {
		print_r($_POST);
		echo '
			<h2>Datenbank Konfiguration:</h2>
			<form action="index.php?step=1" method="POST" onsubmit="return checkSubmitForm();">
				<table>
					<tr>
						<td><b>Server:</b></td>
						<td><input type="text" name="loc" value="localhost" id="loc" /></td>
					</tr>	
					<tr>
						<td><b>Database:</b></td>
						<td><input type="text" name="database" id="database" /></td>
					</tr>
					<tr>
						<td><b>DB User:</b></td>
						<td><input type="text" name="user" id="user" /></td>
					</tr>
					<tr>
						<td><b>Password</b></td>
						<td><input type="password" name="pass" id="pass" /></td>
					</tr>
					<tr>
						<input type="hidden" name="step" value="1" />
						<td>&nbsp;</td>
						<td ><input type="submit" value="Absenden" class="button" /></td>
					</tr>
				</table>
				</form>
		';
	}
	
	function checkConfig() {
		if (file_exists('variables.php')) {

		} else {
			$this->step0();
		}
	}
	
	function checkDbConnects ($data) {
		if($this->dbOn()) {
			$this->dbOff();
			return true;
		} else {
			$this->dbOff();
			return false;
		}
	}
	
	function dbOn ($data){
		if(mysql_connect($data['loc'], $data['user'], $data['pass'])) {
			return true;
		} else {
			return false;
		}
	}
	
	function dbOff() {
		mysql_close();
	}
	
	function checkDbExists () {
		include('variables.php');
		$data = array("loc" => $loc, 'user' => $user, 'pass' => $pass); 
		if ($this->dbOn($data)) {
			if(mysql_select_db($database)) {
				echo '
					<h2>Die Datenbank '.$database.' existiert bereits.<br />Sollte dies korrect sein, fahren sie bitte fort, oder gehen sie bitte zurück zur Eingabemaske</h2>
					<form action="index.php" method="POST">
						<input type="hidden" name="step" value="0" />
						<input type="submit" value="zurück zur Eingabemaske" />
					</form>
					<form action="index.php" method="POST">
						<input type="hidden" name="step" value="2" />
						<input type="submit" value="Installation fortfahren" />
					</form>					
				';
			} else {
				$this->writeDatabase();
			}
		} else {
		
		}
	}
	
	function check
	
	function writeDatabase (){
		$sql = "CREATE ";
	}
	
	function writeConfig() {
		unset($_POST['step']);
		$text = "<?php \n\n";
		foreach($_POST as $key => $value){
		  $text .= "\t".'$'.$key.' = "'.$value.'";'."\n";
		}            
		$text .= "\n?>";
		$filename = '../system/libs/variables.php';
		$handler = fopen($filename, "w");
		fwrite($handler, $text);
		fclose($handler);
		chmod($filename, 0655);
		
		if (file_exists($filename)) {
			if($this->checkDbConnects($_POST)) {
				echo '
					<h2>Das Konfigurationsfile wurde geschrieben<br /></h2>
					<form action="index.php" method="POST">
						<input type="hidden" name="step" value="2" />
						<input type="submit" value="Installation fortfahren" />
					</form>
				';
			} else {
				echo '
					<h2>Es konnte keine Verbindung zur Datenbank hergestellt werden, bitte überprüfen sie ihre Angaben.<br /></h2>
					<form action="index.php" method="POST">
						
						<input type="hidden" name="step" value="0" />
						<input type="submit" value="Einen Schritt zurück" />
					</form>
				';
			}
		} else {
			
		}
  
	}

	function readConfig() {
	
	}
}



?>
 
