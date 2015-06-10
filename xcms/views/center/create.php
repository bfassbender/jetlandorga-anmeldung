<script type="text/javascript" src="/work/system/libs/js/tiny_mce/tiny_mce.js"></script>
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

