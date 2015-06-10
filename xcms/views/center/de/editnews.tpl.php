<?
/*
		echo "<pre style='background-color: white'>";
		print_r($news);
		print_r($autor);
		echo "</pre>";
*/
?>
<?php if ($_SESSION['pacifare']['login']['admin'] == true): ?>
<script type="text/javascript" src="libs/js/tiny_mce/tiny_mce.js"></script>
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
var PluginPath = "libs/js/tiny_mce/plugins/ezfilemanager/ezfilemanager.php";
       if (PluginPath.indexOf("?") < 0)
      {
            PluginPath = PluginPath + "?type=" + type;
         }
       else {
            PluginPath = PluginPath + "&type=" + type;
         }

       tinyMCE.activeEditor.windowManager.open({
           file : PluginPath,
           title : '',
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
$(document).ready(function() {
    $('dd').click(function(){
		var id = $(this).attr('name');
		if (confirm('Nachricht wirklich löschen?')){
			$.ajax({
	   			type: "POST",
	   			url: "?action=delNews",
	   			data: {id: id},
   				success: function(msg){
					alert(msg);
					location.reload();	
				},
   				error: function(){
   					alert('Ein Fehler ist aufgetreten.');
				}
			});
		}
	});
    $('dt').click(function(){
		var id = $(this).attr('name');
			$.ajax({
	   			type: "POST",
	   			url: "?action=changeNews",
	   			data: {id: id},
   				success: function(msg){
					$('#span_'+id).html(msg);
				},
   				error: function(){
   					alert('Ein Fehler ist aufgetreten.');
				}
			});
	});	
});	
</script>

<style>

	table {
		margin: 20px 0 20px 0 !important;
		padding: 0 5px;
		font: 10px "Lucida Grande", Helvetica, Verdana, Arial;
	}

	th, td {
		padding: 1px 10px 1px 4px;
		vertical-align: top;
		height: 15px;
		border: 1px solid black;
		border-top: none;
		color: black;
	}
	
	th {
		background-color: #82CFEF;
		color: white;
		border: solid 1px black;	
	}
	
	tbody tr {
		border: 1px solid black;
		background-color:  #A4C3CC;
	}
	
	tbody tr.even {
		background-color: #9AB7BF;
	
	}
	
	a:link, a:active, a:visited {
		text-decoration: none;
	}
	
</style>


	<div style='margin: 0 0 20px 20px;'><a style='color: white; font-weight: bold' href='javascript:history.back(-1)'>&laquo; Zur&uuml;ck</a></div>
<div class='anmeldung' style='width: 798px'>
		<div class='heading_admin'><b>Newsbereich</b></div>
		<br>
		<form action="?action=editnews" method="post" enctype='text/html'>
			<input type="hidden" name="editNews" value="true">
			<input type="hidden" name="id" value="<?php echo $news[0]['id'];?>">		
			<div style='background-color: #82CFEF; width: 600px'>
			<fieldset>
				<legend><b>Neue News anlegen</b></legend>
				<lable><b>Datum</b></lable><br>
				<input type="text" name="date" value="<?php echo date('d.m.Y', time());?>" style='width: 100px' readonly><br>				
				<lable><b>Autor</b></lable><br>
				<select name='autor'>
					<option value=''></option>
					<?php if(count($autor) != '0') foreach ($autor as $autors): ?>
						<?$sel = ($autors['autor'] == $news[0]['autor']) ? 'selected' : '';  ?>
						<option value='<?php echo $autors['autor'];?>' style='width: 170px' <?php echo $sel;?>><?php echo $autors['autor'];?></option>
					<?php endforeach ?>
				</select><br>
				<lable><b>Neuer Autor</b></lable><br>
				<input type="text" name="autor_new" value="" style='width: 200px'><br>
				<lable><b>Titel</b></lable><br>
				<input type="text" name="title" value="<?php echo $news[0]['title'];?>" style='width: 400px'><br>
				<lable><b>Newstext</b></lable><br>
				<textarea name="newstext" rows="10" cols="49"><?php echo $news[0]['newstext'];?></textarea><br>
				<input type="checkbox" name="online" value="1" <?php echo ($news[0]['online'] == '1') ? 'checked' : ''; ?>>&nbsp;<lable><b>Online</b></lable><br>				
				<br>
				<input type="submit" value="eintragen">
			</fieldset>
		</form>

</div>
	
<? else: ?>
	<script>self.location.href='index.php'</script>
<? endif;?>
