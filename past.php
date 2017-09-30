<?php
    session_start();
    require_once 'check_login.php';
    require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Minulé projekty - Fakultní informační systém</title>
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
                <div class="link"><h4>ODHLÁSIT SE</h4><hr></div>
            </li>

        </ul>
    </div>

    <!--Obsah stranky-->
    <div class="obsah">

        <div class="vnitrni_obsah">
            <h2>Minulé projekty</h2>
                <?php
                //TODO DATE
                $date = date("Y-m-d h:i:s");
                $login = $_SESSION['login'];
                $query = "SELECT projekt.nazev, informace.pocet_bodu, projekt.maximum_bodu, vyucujici.jmeno FROM student, projekt, varianta, prihlasena_varianta, informace, resitel, vyucujici WHERE student.login = '$login' AND student.id_resitel = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = varianta.id_varianta AND projekt.id_projekt = varianta.projekt AND student.id_resitel = resitel.id_resitel AND resitel.info_reseni = informace.id_informace AND informace.hodnotici = vyucujici.id_vyucujici
                ";
                $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    // nazev projektu
                    echo "{$data_array['nazev']} ";

                    // pocet ziskanych bodu
                    echo "{$data_array['pocet_bodu']} ";

                    //maximum bodu
                     echo "{$data_array['maximum_bodu']} ";

                    //jmeno hodnoticiho
                    echo "{$data_array['jmeno']} ";
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