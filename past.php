<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Předchozí projekty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Předchozí projekty</h2>
                
			<div id="table-scroll">	<br>		
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>PROJEKT</b></font></td> 
					<td><font color="#FFF"><b>VARIANTA</b></font></td> 
					<td><font color="#FFF"><b>PŘEDMĚT</b></font></td> 
					<td><font color="#FFF"><b>HODNOTÍCÍ</b></font></td> 
					<td><font color="#FFF"><b>ZÍKSANÝCH BODŮ</b></font></td> 
					<td><font color="#FFF"><b>MAX. BODŮ</b></font></td> 
    			</tr>
				
				<?php
                //TODO DATE, TEAM PROJECT
                $date = date("Y-m-d h:i:s");
                $login = $_SESSION['login'];
                $query = "SELECT projekt.nazev, informace.pocet_bodu, projekt.maximum_bodu, vyucujici.jmeno FROM student, projekt, varianta, prihlasena_varianta, informace, resitel, vyucujici WHERE student.login = '$login' AND student.id_resitel = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = varianta.id_varianta AND projekt.id_projekt = varianta.projekt AND student.id_resitel = resitel.id_resitel AND resitel.info_reseni = informace.id_informace AND informace.hodnotici = vyucujici.id_vyucujici
                ";?>
                
				<!--  JEDNOTLIVCI -->
				<tr bgcolor="#656665">
						<td colspan="6"><font color="#FFF"><b>SAMOSTATNÉ</b></font></td> 
					</tr>    
				<tr>
				
				<?php $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){ ?>
	
				    <td><?php echo "{$data_array['nazev']} ";?></td> 
                    <td><?php echo "{$data_array['nazev']} ";?></td>
                    <td><?php echo "{$data_array['nazev']} ";?></td>
                    <td><?php echo "{$data_array['jmeno']} ";?></td>
                    <td><?php echo "{$data_array['pocet_bodu']} ";?></td>
					<td><?php echo "{$data_array['maximum_bodu']} ";?></td>
			   </tr>
				<?php } ?>
				
				<!--  TÝMY -->
				<tr bgcolor="#656665">
						<td colspan="6"><font color="#FFF"><b>TÝMOVÉ</b></font></td> 
				</tr>    
				
             </table> 
			</div>	


<?php include("template/footer.php");?>