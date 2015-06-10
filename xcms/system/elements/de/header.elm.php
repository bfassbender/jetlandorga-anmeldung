<?
/*
			echo "<pre style='background-color: white'>";
		print_r($_SESSION);
		echo "</pre>";
*/
?>


<script>
$(document).ready(function(){
	$('#showLogin').html('Follow the white rabbit ...');
	$('#showLogin').click(function(){
		$('#login').toggle('fast');
	});
});	
</script>
<div id='divNoPrint'>
	<div><img src="views/images/layout/header.jpg" border=0 alt="" title="" /></div>
	<?if ($_SESSION['pacifare']['login']['admin'] == false): ?>
		<div style='margin: -240px 0 0 760px; color: white'><span id='showLogin' style='cursor: pointer'></span></div>
		
	<div id='login' style='margin: 0px 0 0 720px;  display: none; z-index: 99'>
		<form action='<?php echo $_SERVER['PHP_SELF']?>?action=login' method='post'>
			<input type="text" name="login[user]" value="" size="15" style='border: 1px solid;background-color: #ffffff; font-size: 10px' />
			<input type="password" name="login[pw]" value="" size="15" style='border: 1px solid;background-color: #ffffff; font-size: 10px' />
			<input type='hidden' name='loc' value='<? echo $_REQUEST['action']?>' />
			<input type="submit" name="" value="login..." id="logmein" style='border: 1px solid;background-color: #ffffff; font-size: 10px' />
		</form>
	</div>
	<? else:  ?>
		<div style='margin: -240px 0 0 830px; color: white; '>
			<input type='button' onclick="self.location.href='<?php echo $_SERVER['PHP_SELF']?>?action=logout&loc=<?echo $_REQUEST['action']?>'" style='border: 1px solid;background-color: #ffffff; font-size: 10px' value='logout'>
		</div>
		<?php if($_SESSION['pacifare']['login']['superadmin'] == true || $_SESSION['pacifare']['login']['admin'] == true): ?>
			<div style='margin: 115px 0 0 -320px; color: white; '>
				Eingeloggt als: <b><?php echo $_SESSION['pacifare']['login']['user'];?></b>
			</div>
		<?php endif;?>
	<? endif; ?>
</div>

