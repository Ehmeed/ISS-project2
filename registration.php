<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Registrace předmětů - Fakultní informační systém';
include("template/header.php");
$login = $_SESSION['login'];
//registrace
$query = "SELECT predmet.id_predmet FROM predmet";
$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
  $subject = $data_array['id_predmet'];
  if (isset($_POST[$subject])){     
    //TODO check jestli predmet neni full
    dbqueryinsert("INSERT INTO zapsany_predmet(login, id_predmet) VALUES('$login', {$data_array['id_predmet']})", $conn);    
  }
}


?>

            <h2>Registrace předmětů</h2>
            
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>NAZEV PREDMETU</b></font></td> 
        			<td><font color="#FFF"><b>PRIHLASENO STUDENTU</b></font></td>
        			<td><font color="#FFF"><b>KAPACITA</b></font></td>
        			<td><font color="#FFF"><b>REGISTRACE</b></font></td>
    			</tr>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"><br> 
                <?php
                $query = "SELECT nazev, kapacita, id_predmet FROM predmet";
                $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    


                    $query = "SELECT COUNT(*) as 'pocet', predmet.id_predmet FROM zapsany_predmet, predmet WHERE predmet.nazev = '{$data_array['nazev']}' AND predmet.id_predmet = zapsany_predmet.id_predmet";
                    $count_data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                    $count = mysqli_fetch_array($count_data, MYSQLI_ASSOC);

                    ?>                 

                    <tr> 
                       <td> <?php echo "{$data_array['nazev']}";?> </td>   
                       <td> <?php echo "{$count['pocet']}";?> </td>   
                       <td> <?php echo "{$data_array['kapacita']}";?> </td>  
                       
                       <td><input type="submit" value="REGISTROVAT" size="50" name="<?php echo "{$data_array['id_predmet']}"?>"></td> 
                       
           			</tr>  
                 
                    <?php
                }

                ?>
                </form>


<?php include("template/footer.php");?>