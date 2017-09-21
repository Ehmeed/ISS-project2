<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Předměty - Fakultní informační systém</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="style.css" type="text/css" />
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

</div>

<script src="assets/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>