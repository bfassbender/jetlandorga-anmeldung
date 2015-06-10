<script type="text/javascript" src="jquery-1.7.2.min.js"></script> 

<script>
    function toggleRegister(id) {
        $('div [id*="_box"]').each(function(){ $(this).hide();});
        $('#'+id+'_box').show();
    }            
</script>
<style>
    body {
        font-family: sans-serif;
        font-size: 12px;
    }
    .userboxes {
        border: 1px solid;
        border-radius: 5px 5px 5px 5px;
        box-shadow: 0 1px 1px #FFFFFF inset;
        margin: 0.5em 0 1.3em;
        padding: 10px 10px 10px 25px;
        border: 1px solid maroon !important;
        color: #000000;        
        width: 400px;
        background-color: #EEEEEE;        
    }
    .input_text {
        background-color: #FFFFFF;
        border: 1px solid #747474;
        float: left;
        height: 25px;
        line-height: 25px;
        margin: 0 0 5px;
        padding: 0 7px;
        width: 330px;
    }
    .btn_login {
        border: 1px solid;
        border-radius: 5px 5px 5px 5px;
        box-shadow: 0 1px 1px #FFFFFF inset;
        padding: 3px 10px 3px 10px;
        color: #FFFFFF;    
	    background-color: #9bc3e8;
    	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#9bc3e8), to(#2d81cf)); /* Safari 5.1, Chrome 10+ */
    	background: -webkit-linear-gradient(top, #9bc3e8, #2d81cf); /* Firefox 3.6+ */
    	background: -moz-linear-gradient(top, #9bc3e8, #2d81cf); /* IE 10 */
    	background: -ms-linear-gradient(top, #9bc3e8, #2d81cf); /* Opera 11.10+ */
    	background: -o-linear-gradient(top, #9bc3e8, #2d81cf);        
    }
</style>

<input type="button" value="Login" onclick="toggleRegister('login')" class="btn_login" />
<input type="button" value="Register" onclick="toggleRegister('register')" class="btn_login" />
<input type="button" value="Pwd vergessen" onclick="toggleRegister('pwd')" class="btn_login" />
<br /><br />
<div style="position:absolute;top:15%;left:30%">
    <div id="login_box" style="display:block">
        <fieldset class="userboxes">
            <legend><h3>Login</h3></legend>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="text/html">
                <label><b>Username</b></label><br />
                <input type="text" name="username" class="input_text" />    
                <br /><br />
                <label><b>Passwort</b></label><br />
                <input type="passwort" name="pwd" class="input_text" />
                <br /><br />
                <input type="hidden" name="action" value="login" />
                <input type="submit" value="Login" class="btn_login" />       
            </form>        
        </fieldset>
    </div>
    
    <div id="register_box" style="display:none">
         <fieldset class="userboxes">
            <legend><h3>Register</h3></legend>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="text/html">
                <label><b>Username</b></label><br />
                <input type="text" name="username" class="input_text" />    
                <br /><br />
                <label><b>Passwort</b></label><br />
                <input type="passwort" name="pwd" class="input_text" />
                <br /><br />
                <label><b>Emailadresse</b></label><br />
                <input type="text" name="email" class="input_text" />
                <br /><br />
                <input type="hidden" name="action" value="register" />
                <input type="submit" value="Registrieren" class="btn_login" />       
            </form>        
        </fieldset>   
    </div>
    
    <div id="pwd_box" style="display:none">
         <fieldset class="userboxes">
            <legend><h3>Passwort vergessen</h3></legend>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="text/html">
                <label><b>Emailadresse</b></label>
                <br /><br />
                <input type="text" name="email" class="input_text" />
                <br /><br />
                <input type="hidden" name="action" value="pwd" />
                <input type="submit" value="Recover" class="btn_login" />       
            </form>        
        </fieldset>   
    </div>
</div>
<?php
var $action = $_REQUEST['action'];

if ($action == 'register') {

} else if ($action == 'login') {    
    $_SESSION['c6']['login']['user'] = '';
    $_SESSION['c6']['login']['role'] = '';
    $_SESSION['c6']['login']['rights'] = '';
} else if ($action == 'pwd') {

} 



?> 


