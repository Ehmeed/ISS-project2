<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Registrace předmětů - Fakultní informační systém';
include("template/header.php");
?>

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


<?php include("template/footer.php");?>