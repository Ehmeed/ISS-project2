<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Zapsané předměty - Fakultní informační systém</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="wrap">
    <nav class="nav-bar navbar-inverse" role="navigation">
        <div id ="top-menu" class="container-fluid active">
            <a class="navbar-brand" href="home.php">FAKULTNÍ INFORMAČNÍ SYSTÉM</a>
            <ul class="nav navbar-nav">
                <form id="qform" class="navbar-form pull-left" role="search">
                    <input type="text" class="form-control" placeholder="Search" />
                </form>
            </ul>
        </div>
    </nav>

    <aside id="side-menu" class="aside" role="navigation">
        <ul class="nav nav-list accordion">
            <li class="nav-header">
                <div class="link"><i class="fa fa-lg fa-globe"></i>ÚVOD<i class="fa fa-chevron-down"></i></div>
            </li>

            <li class="nav-header">
                <div class="link"><i class="fa fa-lg fa-users"></i>PŘEDMĚTY<i class="fa fa-chevron-down"></i></div>
            </li>

            <li class="nav-header">
                <div class="link"><i class="fa fa-cloud"></i>PROJEKTY<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="current.php">Aktuální</a></li>
                    <li><a href="past.php">Minulé</a></li>
                </ul>
            </li>

            <li class="nav-header">
                <div class="link"><i class="fa fa-lg fa-map-marker"></i>OSTATNÍ<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="#">Potrvzení o studiu</a></li>
                    <li><a href="#">Výstupní list studenta</a></li>
                    <li><a href="#">Výstupní list absolventa</a></li>
                    <li><a href="info.php">Informace</a></li>
                </ul>
            </li>

            <li class="nav-header">
                <div class="link"><i class="fa fa-lg fa-file-image-o"></i>ODHLÁSIT SE<i class="fa fa-chevron-down"></i></div>
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
            <h2>Zapsané předměty</h2>
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