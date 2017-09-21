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

<div class="wrap">

    <!--Header-->

    <nav class="nav-bar navbar-inverse" role="navigation">
        <div id ="top-menu" class="container-fluid active">
            <a class="navbar-brand" href="#">FAKULTNÍ INFORMAČNÍ SYSTÉM</a>
        </div>
    </nav>

    <!--Menu-->

    <aside id="side-menu" class="aside">
        <ul class="nav nav-list accordion">
            <li>
                <div class="link"><a href="home.php" class="plain">ÚVOD</a></div>
            </li>
            <li>
                <div class="link"><a href="lectures.php" class="plain">PŘEDMĚTY</a></div>
            </li>
            <li>
                <div class="link"><a href="projects.php" class="plain">PROJEKTY</a></div>
            </li>
            <li>
                <div class="link"><a href="other.php" class="plain">OSTATNÍ</a></div>
            </li>

            <li>
                <div class="link">ODHLÁSIT SE</div>
            </li>

        </ul>
    </aside>

    <!--Body content-->

    <div class="content">
        <div class="top-bar">
            <a href="#menu" class="side-menu-link burger">
                <span class='burger_inside' id='bgrOne'></span>
                <span class='burger_inside' id='bgrTwo'></span>
                <span class='burger_inside' id='bgrThree'></span>
            </a>
        </div>
        <section class="content-inner">
            <h2>Úvod</h2>
            <h4>Poslední přihlášení: <span id="currTime"></span></h4>
            <h4>Jméno:</h4>
            <h4>Login:</h4>
        </section>


    </div>

</div>

<script src="assets/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
    var time = new Date();
    document.getElementById("currTime").innerHTML = time.toLocaleTimeString();
</script>

</body>
</html>
<?php ob_end_flush(); ?>