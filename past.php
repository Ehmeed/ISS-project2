<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Předchozí projekty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Předchozí projekty</h2>
                <?php
                //TODO DATE, TEAM PROJECT
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


<?php include("template/footer.php");?>