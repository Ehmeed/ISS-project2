<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Úvod - Fakultní informační systém</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>

<div class="web">

    <!--Hlavicka-->

    <div class="header">
        <div class="container-fluid active">
            <a class="plain" href="home.php"><h3>FAKULTNÍ INFORMAČNÍ SYSTÉM</h3></a>
        </div>
    </div>

    <!--Menu-->

    <div class="menu">
        <ul>
            <li>
                <div class="link"><a href="home.php" class="plain"><h4>ÚVOD</h4><hr></a></div>
            </li>
            <li>
                <div class="link"><a href="lectures.php" class="plain"><h4>PŘEDMĚTY</h4><hr></a></div>
            </li>
            <li>
                <div class="link"><a href="projects.php" class="plain"><h4>PROJEKTY</h4><hr></a></div>
            </li>
            <li>
                <div class="link"><a href="other.php" class="plain"><h4>OSTATNÍ</h4><hr></a></div>
            </li>

            <li>
                <div class="link"><h4>ODHLÁSIT SE</h4><hr></div>
            </li>

        </ul>
    </div>

    <!--Obsah stranky-->

    <div class="obsah">

        <div class="vnitrni_obsah">
            <h2>Úvod</h2>
            <h4>Poslední přihlášení: <span id="currTime"></span></h4>
            <h4>Jméno:</h4>
            <h4>Login:</h4>
        </div>

    </div>

</div>

<script>
    var time = new Date();
    document.getElementById("currTime").innerHTML = time.toLocaleTimeString();
</script>

</body>
</html>
<?php ob_end_flush(); ?>