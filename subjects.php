<?php
    session_start();
    require_once 'check_login.php';
    require_once 'dbconnect.php';
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
                <div class="link"><a href="logout.php" class="plain"><h4>ODHLÁSIT SE</h4><hr></a></div>
            </li>

        </ul>
    </div>

    <!--Obsah stranky-->
    <div class="obsah">

        <div class="vnitrni_obsah">
            <h2>Zapsané předměty</h2>
                <?php
                $login = $_SESSION['login'];
                $query = "SELECT nazev FROM predmet, student, zapsany_predmet WHERE student.login = '$login' AND student.login = zapsany_predmet.login AND zapsany_predmet.id_predmet = predmet.id_predmet";
                $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    echo "{$data_array['nazev']}";
                    // NAZEV PREDMETU   TODO - JESTE NECO NEBO NE?
                    ?>
                    <br>
                    <?php
                }

                ?>
        </div>

    </div>

</div>


</body>
</html>
<?php ob_end_flush(); ?>