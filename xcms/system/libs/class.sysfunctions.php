<?php
include_once('system/libs/class.util.php');
class Sysfunctions {
	
	var $util;
	
	function Sysfunctions (){
		$this->util = new util();
	
	}
	
	function newPage(){
		$this->setLayout('system');
		$this->setView('sysviews');
		$this->util = new util();
		$data = array();
		
		if(isset($_POST['create'])){
			switch($_POST['seitenart']){
				case 'plain':
					$content = '<? $this->util = new util(); ?>';
					break;
					
				case 'text':
$content = '<? $this->util = new util(); ?>
<script type="text/javascript" src="system/libs/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,ezfilemanager",
	
	// Theme options
	theme_advanced_buttons1 : "bold,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,link,unlink,anchor,image",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	width : "550",
	height: "300",
	relative_urls : false,
	convert_urls : false,
	file_browser_callback : "ezfilemanager",				
	});

	function ezfilemanager (field_name, url, type, win) {
		//Change the var pluginPath to reflect your installation path
		var PluginPath = "system/libs/js/tiny_mce/plugins/ezfilemanager/ezfilemanager.php";
       	if (PluginPath.indexOf("?") < 0)
		{ PluginPath = PluginPath + "?type=" + type;
        } else { PluginPath = PluginPath + "&type=" + type; }

		tinyMCE.activeEditor.windowManager.open({
			file : PluginPath,
			title : "",
			width : 750,
			height : 440,
			resizable : "yes",
			scrollbars : "yes",
			inline : "yes",
			close_previous : "no"
			}, {
           window : win,
           input : field_name
         });
		return false;
	}
</script>
<form>
<textarea rows="10" cols="49">test</textarea><br />
</form>
';
			break;
			
			case 'modul':
				$content = '<? $this->util = new util(); ?>
<a href="javascript:openwindow(\'selModul\', \''.$_POST['name'].'\')">Modul w&auml;hlen ...</a>
<br /><br />
<?
$this->db = new dbfunctions();
$data = $this->db->dbCatchAll(\'module\', \'*\', "page = \'".$_REQUEST[\'_\']."\'");

if (isset($data[0]["modul"])){
	if (file_exists(MODULE.DS.$data[0]["modul"].DS."class.".substr($data[0]["modul"], 0, -3)."php")){
		include(MODULE.DS.$data[0]["modul"].DS."class.".substr($data[0]["modul"], 0, -3)."php");
	}
} 
?>
				
				';
				break;
										
			}
			$this->page($_POST['name'], $content);
			header('Location: index.php?.='.$_POST['name'], '301');
			$this->util->debug($_POST);
			die();
		} else {
			return($data);
		}
	}
	
	function selModul(){
		$this->setLayout('system');
		$this->setView('sysviews');
		$this->util = new util();	
		$data = array();
		
		if (isset($_POST['create'])){
			$this->db = new dbfunctions();
			$c = $this->db->dbCount('module', "page = '".$_POST['page']."'");
			if ($c == '0'){
				$this->db->dbInsert('module', "page = '".$_POST['page']."', modul = '".$_POST['modul']."'");
			} else {
				$this->db->dbUpdate('module', "modul = '".$_POST['modul']."'", "page = '".$_POST['page']."'");
			}
			echo "<script>opener.location.reload(); self.close();</script>";
			die();
		} else {

			if ($handle = opendir(MODULE.DS)) {
			    while (false !== ($file = readdir($handle))) {
			    	if ($file != '.' && $file != '..' && $file != '.htaccess' && substr($file, -3,3) == 'mod'){
					 	$data['file'][] = $file;							
					}		
			    }
			}
			$data['page'] = $_GET['page'];
			fclose ($handle);
		}
		return($data);		
	}
	
	function page($name, $content){
		$fname = PATH.$name.'.tpl.php';
		$fp = fopen($fname, "w");
		fwrite($fp, $content);
		fclose($fp);
		@chmod($name, 0775);	
	}
}
