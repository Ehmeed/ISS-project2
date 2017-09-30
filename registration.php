<?php
    session_start();
    require_once 'check_login.php';
    require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrace - Fakultní informační systém</title>
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
            <h2>Registrace předmětů</h2>
                <?php
                $query = "SELECT nazev, kapacita FROM predmet";
                $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    echo "{$data_array['nazev']}". " ";
                    //    NAZEV PREDMETU   

                    $query = "SELECT COUNT(*) as 'pocet' FROM zapsany_predmet, predmet WHERE predmet.nazev = '{$data_array['nazev']}' AND predmet.id_predmet = zapsany_predmet.id_predmet";
                    $count_data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                    $count = mysqli_fetch_array($count_data, MYSQLI_ASSOC);
                    echo "{$count['pocet']}";
                    // PRIHLASENO  

                    echo " / ";           

                    echo  "{$data_array['kapacita']}";
                    // KAPACITA
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