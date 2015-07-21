<style>
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>


     <form class="form-signin" action='<?php echo $_SERVER['PHP_SELF']?>?action=login' method='post'>
       <h2 class="form-signin-heading">Bitte melde Dich an</h2>
       <label for="inputEmail" class="sr-only">Benutzername</label>
       <input type="text" name="login[user]" id="inputEmail" class="form-control" placeholder="Benutzername" required autofocus>
       <label for="inputPassword" class="sr-only">Passwort</label>
       <input type="password" name="login[pw]" id="inputPassword" class="form-control" placeholder="Passwort" required>
       <input type='hidden' name='loc' value='<? echo $_REQUEST['action']?>' />
       <button id="logmein" class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
	</form>

