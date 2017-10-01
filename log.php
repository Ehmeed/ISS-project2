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
</head>
<body>

<div class="wrap">

    <div id="login-form">

        <center>
            <br><h2>Fakultní informační systém</h2>
            <hr width="350px">
            <a href="index.php" style="text-decoration: none"><button class="tlacitko2"><h4>PŘIHLÁSIT SE JAKO STUDENT</h4></button></a><br><br>
            <a href="index.php" style="text-decoration: none"><button class="tlacitko2"><h4>PŘIHLÁSIT SE JAKO VYUČUJÍCÍ</h4></button></a>
	
	</div>

	

</div>

</body>
</html>
<?php ob_end_flush(); ?>
