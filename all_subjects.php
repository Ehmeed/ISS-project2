<?php
    session_start();
    require_once 'check_login.php';
    require_once 'dbconnect.php';
    $title = 'Všechny předměty - Fakultní informační systém';
    include("template/header.php"); 
    header('Content-Type: text/html; charset=utf-8');
    ini_set('default_charset', 'UTF-8');
?>

            <h2>Všechny předměty</h2>
            <?php
            $query = "SELECT * FROM predmet, vyucujici WHERE predmet.id_garant = vyucujici.id_vyucujici";
            $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
            while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                echo "{$data_array['nazev']}". " ". "{$data_array['jmeno']}";
                //    NAZEV PREDMETU                  CELE JMENO GARANTA
                ?>
                <br>
                <?php
            }

            ?>
            

<?php include("template/footer.php");?>