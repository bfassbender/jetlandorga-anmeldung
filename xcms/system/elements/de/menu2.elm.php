 
<?

#echo "<pre>";
#print_r($_SESSION);
#echo "</pre>";

?>

<script>
$(document).ready(function(){
	$('#flyer').click(function(){
		$('#flyer_disp').toggle('fast');
		$('#forum_disp').hide('fast');
	});
	$('#forum').click(function(){
		$('#forum_disp').toggle('fast');
		$('#flyer_disp').hide('fast');
	});	
});
</script>

<div id='divNoPrint'>

<? if (strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE')): ?>

<div class='menu1'>
	<ul>
		<li><a href=<? echo $_SERVER['PHP_SELF']?>>Home</a></li>
		<li><span id='flyer'><a href='#'>Flyer</a></span></li>
		<li><a href="?action=anmeldungen" <?php if ($_REQUEST['action'] == 'anmeldungen') { echo "style='background-color: #82CFEF'";}?>>Anmeldung</a></li>
		<li><a style='width: 100px' href="?action=teilnehmer" <?php if ($_REQUEST['action'] == 'teilnehmer') { echo "style='background-color: #82CFEF'";}?>>Teilnehmerliste</a></li>
		<li><span id='forum'><a href='#'>Forum</a></span></li>
		<li><a href="?action=galerie" <?php if ($_REQUEST['action'] == 'galerie') { echo "style='background-color: #82CFEF'";}?>>Galerie</a></li>
		<li><a href="?action=team" <?php if ($_REQUEST['action'] == 'team') { echo "style='background-color: #82CFEF'";}?>>Team</a></li>
		<li><a href="?action=kontakt" <?php if ($_REQUEST['action'] == 'kontakt') { echo "style='background-color: #82CFEF'";}?>>Kontakt</a></li>
		<li><a href="?action=agb" <?php if ($_REQUEST['action'] == 'agb') { echo "style='background-color: #82CFEF'";}?> >AGB</a></li>
			
	<? if ($_SESSION['pacifare']['login']['admin'] == true): ?>
		<li><a href="?action=admin">Admin</a></li>	
	<? endif;?>	
	</ul>	
</div>	
	<?php if ($_REQUEST['action'] == 'intime' || $_REQUEST['action'] == 'outtime'): ?>
		<div style='display: block;' id='flyer_disp'>
	<?php else: ?>
		<div style='display: none;' id='flyer_disp'>
	<?php endif ?>			
			<span style='margin: 3px 0 0 100px;width: 80px;' class='span_menu'>
				<a class='span_menu' href=<? echo $_SERVER['PHP_SELF']?>?action=intime <?php if ($_REQUEST['action'] == 'intime') { echo "style='background-color: #82CFEF'";}?>>In-Time</a>
			</span>
			<span style='margin: 3px 0 0 100px;width: 80px;' class='span_menu'>
				<a class='span_menu' href=<? echo $_SERVER['PHP_SELF']?>?action=outtime <?php if ($_REQUEST['action'] == 'outtime') { echo "style='background-color: #82CFEF'";}?>>Out-Time</a>
			</span>		
		</div>						
		
		<div style='display: none' id='forum_disp'>
			<span style='margin: 3px 0 0 377px;width: 80px;' class='span_menu'><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=4" target=_blank>Allgemein</a></span>
			<span style='margin: 3px 0 0 377px;width: 80px;' class='span_menu'><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=5" target=_blank>Spieler</a></span>	
			<span style='margin: 3px 0 0 377px;width: 80px;' class='span_menu'><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=6" target=_blank>NSCs</a></span>	
		</div>						


<? else: ?>	
<div class='menu1'>
	<ul>
		<li><a href=<? echo $_SERVER['PHP_SELF']?>>Home</a></li>
		<li><span id='flyer' class='span'>Flyer</span></li>
		<li><a href="?action=anmeldungen" <?php if ($_REQUEST['action'] == 'anmeldungen') { echo "style='background-color: #82CFEF'";}?>>Anmeldung</a></li>
		<li><a style='width: 100px' href="?action=teilnehmer" <?php if ($_REQUEST['action'] == 'teilnehmer') { echo "style='background-color: #82CFEF'";}?>>Teilnehmerliste</a></li>
		<li><span id='forum' class='span'>Forum</span></li>
		<li><a href="?action=galerie" <?php if ($_REQUEST['action'] == 'galerie') { echo "style='background-color: #82CFEF'";}?>>Galerie</a></li>
		<li><a href="?action=team" <?php if ($_REQUEST['action'] == 'team') { echo "style='background-color: #82CFEF'";}?>>Team</a></li>
		<li><a href="?action=kontakt" <?php if ($_REQUEST['action'] == 'kontakt') { echo "style='background-color: #82CFEF'";}?>>Kontakt</a></li>
		<li><a href="?action=agb" <?php if ($_REQUEST['action'] == 'agb') { echo "style='background-color: #82CFEF'";}?> >AGB</a></li>
			
	<? if ($_SESSION['pacifare']['login']['admin'] == true): ?>
		<li><a href="?action=admin">Admin</a></li>	
	<? endif;?>	
	
	<?php if ($_REQUEST['action'] == 'intime' || $_REQUEST['action'] == 'outtime'): ?>
		<span style='display: block;' id='flyer_disp'>
	<?php else: ?>
		<span style='display: none;' id='flyer_disp'>
	<?php endif ?>			
			<li style='list-style-type: none; margin: 3px 0 0 82px'><a href=<? echo $_SERVER['PHP_SELF']?>?action=intime <?php if ($_REQUEST['action'] == 'intime') { echo "style='background-color: #82CFEF'";}?>>In-Time</a></li>
			<li style='list-style-type: none; margin: 25px 0 0 -82px'><a href=<? echo $_SERVER['PHP_SELF']?>?action=outtime <?php if ($_REQUEST['action'] == 'outtime') { echo "style='background-color: #82CFEF'";}?>>Out-Time</a></li>						</span>		
		<span style='display: none' id='forum_disp'>
			<li style='list-style-type: none; margin: 3px 0 0 358px'><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=4" target=_blank>Allgemein</a></li>
			<li style='list-style-type: none; margin: 3px 0 0 358px'><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=5" target=_blank>Spieler</a></li>	
			<li style='list-style-type: none; margin: 3px 0 0 358px'><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=6" target=_blank>NSCs</a></li>	
		</span>						
	</ul>
</div>	



<? endif; ?>

</div>

