<div class="col-md-2"></div>
<div class="col-md-8">
	<div id='login' style='margin: auto!; display: block; box-shadow: 0 0 30px black;padding:10px;width:450px'>
	<h2>Login:</h2>
		<form action='<?php echo $_SERVER['PHP_SELF']?>?action=login' method='post'>
			<b>Username</b>
			<input type="text" name="login[user]" value="" size="15" class="form-control" style="width:350px" /><br />
			<b>Passwort</b>
			<input type="password" name="login[pw]" value="" size="15" class="form-control" style="width:350px" />
			<br /><br />
			<input type='hidden' name='loc' value='<? echo $_REQUEST['action']?>' />
			<input type="submit" name="" value="login..." id="logmein" class="btn btn-info" style="width:350px" />
		</form>
	</div>
</div>
<div class="col-md-2"></div>