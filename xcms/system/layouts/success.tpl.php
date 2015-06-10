<?

echo "<pre>";
#print_r($_SESSION);
echo "</pre>";

?>

<body style='background-color: #223D4C'>
	<center>
	<br />
	<div class="container" style="width: 30%">
		<div class="column span-10">
			<div class="column span-10" style='color: black; font-family:  Helvetica, Arial, sans-serif; font-size: 14px; background-color: lime; border: white 2px solid; height: 50'>
				<center><b><br><?php echo $_SESSION['msg'];?><?php echo $_SESSION['pacifare']['msg'];?></b></center>
			</div>
			<br>
			<div class="column span-10">
				<?if ($_SESSION['loc'] == false && $_SESSION['back'] == false): ?>
					<center><input type=button value="weiter" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>'" style="background-color: #FFFFFF; font-size: 9px"></center>
				<?php elseif ($_SESSION['loc'] == 'galerie' && $_SESSION['back'] == true): ?>
						<input type=button value="zur&uuml;ck zur alten Galerie" onclick="history.back(-1)" style="background-color: #FFFFFF; font-size: 9px">
						<input type=button value="weiter zur neuen Galerie" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>?action=<?php echo $_SESSION['loc']?>&id=<?php echo $_SESSION['newloc']?>'" style="background-color: #FFFFFF; font-size: 9px">																			
				<?php elseif ($_SESSION['loc'] == false && $_SESSION['back'] == true): ?>
				lala
					<center>
						<input type=button value="zur&uuml;ck zum User" onclick="history.back(-1)" style="background-color: #FFFFFF; font-size: 9px">
						<input type=button value="weiter zur &Uuml;bersicht" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>'" style="background-color: #FFFFFF; font-size: 9px">
					</center>				
				<?php else: ?>
					<center><input type=button value="weiter" onclick="self.location='<?php echo $_SERVER['PHP_SELF']?>?action=<?php echo $_SESSION['loc']?>'" style="background-color: #FFFFFF; font-size: 9px"></center>
				<?php endif;?>

			</div>
		</div>
	</div>
	</center>
</body>
