<?
$query = mysql_query("SELECT * FROM c5_texte_cat");
while($res = mysql_fetch_assoc($query)){
	$data[] = $res;
}
#		echo "<pre>";
#		print_r($data);
#		echo "</pre>";
?>

<link rel="stylesheet" type="text/css" href="views/css/superfish.css" media="screen">
<script type="text/javascript" src="libs/js/superfish/hoverIntent.js"></script>
<script type="text/javascript" src="libs/js/superfish/superfish.js"></script>
<script type="text/javascript">

// initialise plugins
jQuery(function(){
	jQuery('ul.sf-menu').superfish();
});

</script>
		<ul class="sf-menu">
			<li><a href=<? echo $_SERVER['PHP_SELF']?>>Home</a></li>
			<li>
				<a href='javascript:void()'>Chroniken 6</a>
				
				<ul>
					<li><a href="?action=anmeldungen">Anmeldung</a></li>
					<li>
						<a href="javascript:void()">Flyer</a>
						<ul>
							<li class="current">
								<a href="?action=intime">In-Time</a></li>
							<li><a href="?action=outtime">Out-Time</a></li>
						</ul>
					</li>
					<li><a href="?action=agb">AGBs</a></li>
				</ul>

			</li>
			<li>
				<a href="?action=teilnehmer">Teilnehmerliste</a>
			</li>
			<? if ($_SESSION['xcms']['login']['admin'] == true): ?>
				<li><a href="?action=infos">Gazette</a></li>	
			<?php else: ?>
				<li>
					<a href="javascript:void()">Gazette</a>
					<ul>
					<?php foreach($data as $datas): ?>
						<li><a href='?action=infos&cat=<?php echo $datas['id'];?>'><?php echo $datas['name'];?></a></li>
					<?php endforeach; ?>
					</ul>
				</li>
			<? endif;?>			
<!--			<li>-->
<!--				<a href="http://www.falkenberg-ev.de/forum/" target=_blank>Forum</a>-->
<!--				<ul>-->
<!--					<li><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=4" target=_blank>Allgemein</a></li>-->
<!--					<li><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=5" target=_blank>Spieler</a></li>-->
<!--					<li><a href="http://www.falkenberg-ev.de/forum/viewforum.php?f=6" target=_blank>NSCs</a></li>					-->
<!--				</ul>-->
<!--			</li>-->
			<li><a href="?action=galerie">Galerie</a></li>
			<li><a href="?action=team">Team</a></li>
			<li><a href="?action=kontakt">Kontakt</a></li>
		<? if ($_SESSION['xcms']['login']['admin'] == true): ?>
			<li><a href="?action=admin">Admin</a></li>	
		<? endif;?>	
		</ul>
