<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Fakultní informační systém</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="style.css" type="text/css" />   
    <script language="JavaScript" type="text/javascript">
    function login(pop){
    	if(pop == "popup"){
    	    document.getElementById('login').style.visibility="visible";
    	}
    	}
	</script>
</head>
<body>

<div class="wrap">

    <div id="login-form">

        <center>
            <br><h2>Fakultní informační systém</h2>
            <hr width="350px">
            <a href="index.php" style="text-decoration: none"><button class="tlacitko2"><h4>PŘIHLÁSIT SE JAKO STUDENT</h4></button></a><br><br>
            <a href="index.php" style="text-decoration: none"><button class="tlacitko2"><h4>PŘIHLÁSIT SE JAKO VYUČUJÍCÍ</h4></button></a><br><br><br><br><br>
			<p><a href="javascript:login('popup');" style="text-decoration: none"><span class="glyphicon glyphicon-edit"></span>&nbspPřihlásit se jako administrátor</a></p>
			
			<div id="login"> 
                <form name="login" action="" method="post"><br>
                <center>Login: <input size="17" /></center><br>
                <center>Heslo: <input size="17" /></center><br>
                <center><input type="submit" name="submit" value="PŘIHLÁSIT SE" /></center>
                </form>
            </div> 
	
	
	</div>

	

</div>

</body>
</html>
<?php ob_end_flush(); ?>
